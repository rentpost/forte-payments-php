<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use Rentpost\ForteApi\Exception\Request\Factory as ExceptionRequestFactory;
use Rentpost\ForteApi\Model\AbstractModel;
use Rentpost\ForteApi\Model\Attachment;
use Rentpost\ForteApi\ValidatingSerializer\Factory as ValidatingSerializerFactory;
use Rentpost\ForteApi\ValidatingSerializer\ValidatingSerializer;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

/**
 * HttpClient
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class HttpClient
{

    protected ValidatingSerializer $validatingSerializer;


    public function __construct(
        protected GuzzleClient $guzzleClient,
    ) {
        $this->validatingSerializer = (new ValidatingSerializerFactory)->make();
    }


    /**
     * @internal its not encouraged to call this method outside of this library
     *           but it is done occasionally for testing and development purposes
     *
     * WARNING: Please ensure that this remains the only method to make the actual HTTP request to Forte.
     *          Notice that an expcetion is thrown on anything other than a HTTP 2xx response. This is what
     *          we want, as the developer will be forced to handle the exception, or at least the uncaught exception
     *          will bubble up through the error/logging mechanism.
     */
    public function doRequest(
        string $httpMethod,
        string $uri,
        string $responseModelFqns,
        array $options = [],
        int $retryAttempts = 3
    ): AbstractModel
    {
        if ($overrideJson = RequestOverrideHack::getOverrideJson()) {
            return $this->validatingSerializer->deserialize($overrideJson, $responseModelFqns);
        }

        try {
            $response = $this->guzzleClient->request($httpMethod, $uri, $options);
            $json = $response->getBody()->__toString();
            $model = $this->validatingSerializer->deserialize($json, $responseModelFqns);
        } catch (ConnectException $e) {
            if ($retryAttempts > 0) {
                $this->doRequest($httpMethod, $uri, $responseModelFqns, $options, $retryAttempts);

                sleep(2); // Wait a few seconds before hitting the endpoint again
                $retryAttempts--; // Decrement attempts to retry the request
            }

            throw $e;
        } catch (BadResponseException | NotEncodableValueException $e) {
            // A BadResponseException is going to be thrown before $response is set
            // NotEncodableValueException is thrown when parsing the response body, so $response is set
            $response = $e instanceof BadResponseException ? $e->getResponse() : $response;

            // These response codes are generally tempoorary and can be retried
            if (in_array($response->getStatusCode(), [502, 503, 504])) {
                if ($retryAttempts > 0) {
                    $this->doRequest($httpMethod, $uri, $responseModelFqns, $options, $retryAttempts);

                    sleep(3); // Wait a few seconds before hitting the endpoint again
                    $retryAttempts--; // Decrement attempts to retry the request
                }
            }

            throw $e;
        }


        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw ExceptionRequestFactory::make($response, $model);
        }

        return $model;
    }


    /**
     * @internal called internally by subclasses of `AbstractSubResource`
     *
     * Make HTTP request to Forte API. The request JSON data is generated from
     * a model object which is passed. The response JSON data is used to construct
     * nested model objects.
     *
     * @param string $httpMethod GET, POST, etc.
     * @param string $uri Request uri.
     * @param string $responseModelFqns The class model which will be constructed from the response JSON data.
     * @param AbstractModel|null $requestDataModel Object used to generate the request JSON.
     */
    public function makeModelRequest(
        string $httpMethod,
        string $uri,
        string $responseModelFqns,
        ?AbstractModel $requestDataModel = null
    ): AbstractModel
    {
        if ($requestDataModel) {
            $body = $this->validatingSerializer->serialize($requestDataModel);
        } else {
            $body = null;
        }

        return $this->doRequest(
            $httpMethod,
            $uri,
            $responseModelFqns,
            [
                'headers' => [
                    'User-Agent' => 'forte-payments-php/1.0',
                    'Accept' => 'application/json',
                ],
                'body' => $body,
            ],
        );
    }


    /**
     * @internal called internally by subclasses of `AbstractSubResource`
     */
    public function makeModelRequestWithAttachment(
        string $httpMethod,
        string $uri,
        string $responseModelFqns,
        AbstractModel $requestDataModel,
        Attachment $attachment
    ): AbstractModel
    {
        $boundary = uniqid('rp', true);
        $multipart = [
            [
                'name' => 'document',
                'contents' => $this->validatingSerializer->serialize($requestDataModel),
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ],
            [
                'name' => 'file',
                'contents' => file_get_contents($attachment->getSource()),
                'filename' => $attachment->getHttpFileName(),
                'headers' => [
                    'Content-Type' => $attachment->getContentType(),
                ],
            ],
        ];
        $options = [
            'headers' => [
                'Connection' => 'close',
                'Content-Type' => 'multipart/form-data; boundary=' . $boundary,
            ],
            'body' => new MultipartStream($multipart, $boundary),
        ];

        return $this->doRequest(
            $httpMethod,
            $uri,
            $responseModelFqns,
            $options,
        );
    }
}
