<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;
use Rentpost\ForteApi\Attribute;

/**
 * @author Sam Anthony <sam@rentpost.com>
 */
class Factory
{
    /**
     * @param bool $sandbox        is this forte sandbox or not
     * @param string $apiAccessId    forte credential
     * @param string $apiSecureKey   forte credential
     * @param string $authenticatingOrganizationId forte organization id
     * @param LoggerInterface $logger         PSR3 compatible logger
     *
     * @return HttpClient
     */
    public function make(
        string $apiAccessId,
        string $apiSecureKey,
        Attribute\Id\OrganizationId $authenticatingOrganizationId,
        string $baseUri,
        LoggerInterface $logger
    ): HttpClient
    {
        $headers = [
            'Authorization' => 'Basic ' . base64_encode($apiAccessId . ':' . $apiSecureKey),
            'X-Forte-Auth-Organization-Id' => $authenticatingOrganizationId->getValue(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $config = [
            'base_uri' => $baseUri,
            'headers' => $headers, // Default headers
            'http_errors' => false,
            'verify' => false, // FIXME - this was put here to ignore invalid tsl certificate problem
        ];

        $stackHandler = $this->getGuzzleStackHandler($logger);
        if ($stackHandler) {
            $config['handler'] = $stackHandler;
        }

        $guzzleClient = new GuzzleClient($config);

        $httpClient = new HttpClient($guzzleClient);

        return $httpClient;
    }


    /**
     * Creates a Guzzle stack handler with logger
     *
     * @param LoggerInterface $logger
     *
     * @return HandlerStack|null
     */
    protected function getGuzzleStackHandler(LoggerInterface $logger): ?HandlerStack
    {
        if ($logger) {
            $stack = HandlerStack::create();
            $stack->push(
                Middleware::log(
                    $logger,
                    new JsonMessageFormatter()
                )
            );

            return $stack;
        } else {
            return null;
        }
    }
}
