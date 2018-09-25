<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

use GuzzleHttp\Client as GuzzleClient;
use Rentpost\ForteApi\Exception\Request\Factory as ExceptionRequestFactory;
use Rentpost\ForteApi\Model\AbstractModel;
use Rentpost\ForteApi\Model\Attachment;

/**
 * @author Sam Anthony <sam@rentpost.com>
 */
class HttpClient
{

    /** @var \Rentpost\ForteApi\ValidatingSerializer\ValidatingSerializer */
    protected $validatingSerializer;

    /** @var GuzzleClient */
    protected $guzzleClient;


    /**
     * @inheritDoc
     */
    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->validatingSerializer = (new \Rentpost\ForteApi\ValidatingSerializer\Factory())->make();

        $this->guzzleClient = $guzzleClient;
    }


    /**
     * @internal its not encouraged to call this method outside of this library
     *           but it is done occasionally for testing and development purposes
     *
     * WARNING: Please ensure that this remains the only method to make the actual HTTP request to Forte.
     *          Notice that an expcetion is thrown on anything other than a HTTP 2xx response. This is what
     *          we want, as the developer will be forced to handle the exception, or at least the uncaught exception
     *          will bubble up thought the error/logging mechanism.
     *
     * @param string $httpMethod
     * @param string $uri
     * @param string $responseModelFqns
     * @param array $options
     */
    public function doRequest(
        string $httpMethod,
        string $uri,
        string $responseModelFqns,
        array $options = []
    ): AbstractModel
    {
        if ($overrideJson = RequestOverrideHack::getOverrideJson()) {
            return $this->validatingSerializer->deserialize($overrideJson, $responseModelFqns);
        }

        $response = $this->guzzleClient->request($httpMethod, $uri, $options);

        $json = $response->getBody()->__toString();

        $model = $this->validatingSerializer->deserialize($json, $responseModelFqns);
       
        if ($response->getStatusCode() < 200
            || $response->getStatusCode() >= 300
        ) {
            throw ExceptionRequestFactory::make(
                $response,
                $model
            );
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
     *
     * @return AbstractModel
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
            ['body' => $body]
        );

        $json = $response->getBody()->__toString();

        return $this->validatingSerializer->deserialize($json, $responseModelFqns);
    }


    /**
     * @internal called internally by subclasses of `AbstractSubResource`
     *
     * @param string $httpMethod
     * @param string $uri
     * @param string $responseModelFqns
     * @param AbstractModel $requestDataModel
     * @param Attachment $attachment
     */
    public function makeModelRequestWithAttachment(
        string $httpMethod,
        string $uri,
        string $responseModelFqns,
        AbstractModel $requestDataModel,
        Attachment $attachment
    ): AbstractModel
    {
        $options = [
            'multipart' => [
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
            ],
        ];

        return $this->doRequest(
            $httpMethod,
            $uri,
            $responseModelFqns,
            $options
        );
    }
}
