<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;
use Rentpost\ForteApi\Attribute;

/**
 * Factory to build out our HTTP Client
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Factory
{

    /**
     * @param string $apiAccessId                                           Forte credential
     * @param string $apiSecureKey                                          Forte credential
     * @param Attribute\Id\OrganizationId $authenticatingOrganizationId     Forte organization id
     * @param string $baseUri                                               Base URI for request
     * @param LoggerInterface $logger                                       PSR3 compatible logger
     * @param bool $debug                                                   Debug the HTTP responses
     */
    public function make(
        string $apiAccessId,
        string $apiSecureKey,
        Attribute\Id\OrganizationId $authenticatingOrganizationId,
        string $baseUri,
        LoggerInterface $logger,
        bool $debug = false
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

        $stackHandler = $this->getGuzzleStackHandler($logger, $debug);
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
     * @param bool $debug
     *
     * @return HandlerStack|null
     */
    protected function getGuzzleStackHandler(LoggerInterface $logger, bool $debug): ?HandlerStack
    {
        $stack = HandlerStack::create();

        // If we need to debug log the HTTP responses
        if ($debug) {
            $stack->push(Middleware::log($logger, new JsonMessageFormatter()));
        }

        return $stack;
    }
}
