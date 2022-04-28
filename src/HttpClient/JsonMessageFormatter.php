<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * Customize how Guzzle (http) requests made from this Client library are formatted
 * when logged. Request and response are been logged as Json
 */
class JsonMessageFormatter extends \GuzzleHttp\MessageFormatter
{

    /**
     * {@inheritdoc }
     */
    public function format(
        RequestInterface $request,
        ?ResponseInterface $response = null,
        ?\Throwable $error = null
    ): string
    {
        $requestHeaders = $this->getHeaders($request);
        $requestBody = $this->getBody($request);

        if ($response) {
            $responseStatusCode = $response->getStatusCode();
            $responseHeaders = $this->getHeaders($response);
            $responseBody = $this->getBody($response);
        } else {
            $responseStatusCode = 'NO RESPONSE OBJECT';
            $responseHeaders = 'NO RESPONSE OBJECT';
            $responseBody = 'NO RESPONSE OBJECT';
        }

        $jsonData['time'] = (new \DateTime())->format(\DATE_ISO8601);
        $jsonData['request_uri'] = $request->getUri()->__toString();
        $jsonData['request_method'] = $request->getMethod();
        $jsonData['request_headers'] = $requestHeaders;
        $jsonData['request_body'] = $requestBody;
        $jsonData['response_status_code'] = $responseStatusCode;
        $jsonData['response_headers'] = $responseHeaders;
        $jsonData['response_body'] = $responseBody;

        return \GuzzleHttp\json_encode($jsonData);
    }


    /**
     * Pass this Response or Request object, will return the body.
     * If the body is Json, an array of data will be returned instead
     * of a string
     *
     * @param MessageInterface $message
     *
     * @return string|array
     */
    protected function getBody(MessageInterface $message)
    {

        //Multipart request
        if ($message->getBody() instanceof \GuzzleHttp\Psr7\MultipartStream) {
            return $this->parseMultipart($message->getBody());
        }

        $body = $message->getBody()->__toString();

        // Check if body string is Json Data, intentionally not using `\GuzzleHttp\json_decode`
        $data = \json_decode($body, true);

        if ($data !== null) {
            return $data;
        } else {
            return $body;
        }
    }

    protected function parseMultipart(\GuzzleHttp\Psr7\MultipartStream $stream): array
    {
        $boundary = $stream->getBoundary();

        $body = $stream->__toString();

        $parts = explode($boundary, $body);

        foreach ($parts as &$part) {
            /*
             Document upload endpoints will include a huge amounts of binary data
             which will clutter up the logs, so long bodies are been omitted
            */
            if (strlen($part) > 50000) {
                $lines = preg_split("/\r\n|\n|\r/", $part);

                //Keep header lines
                $keepLines = [];
                foreach ($lines as $line) {
                    if (empty($line)) {
                        break;
                    }
                    $keepLines = $line;
                }

                $keepLines[] = 'THIS PART CONTENTS IS TOO LONG TO DISPLAY';

                $part = join(PHP_EOL, $keepLines);
            }

        }

        return $parts;
    }

    /**
     * Pass this Response or Request object, will return the headers.
     *
     * @param MessageInterface $message
     *
     * @return array
     */
    protected function getHeaders(MessageInterface $message): array
    {
        $headers = [];
        foreach ($message->getHeaders() as $name => $values) {
            $headers[] = $name . ': ' . implode(', ', $values);
        }

        return $headers;
    }

}
