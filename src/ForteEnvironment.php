<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi;

use Psr\Log\LoggerInterface;
use Rentpost\ForteApi\HttpClient\Factory;
use Rentpost\ForteApi\HttpClient\HttpClient;

/**
 * Environment container
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class ForteEnvironment
{

    protected string $apiAccessId;
    protected string $apiSecureKey;
    protected Attribute\Id\OrganizationId $authenticatingOrganizationId;
    protected bool $sandbox;
    protected LoggerInterface $logger;
    protected HttpClient $httpClient;


    /**
     * ForteEnvironment constructor.

     * @param string|null $baseUri  Passing null the baseUri will be infered from the sandbox setting (recommended)
     */
    public function __construct(
        string $apiAccessId,
        string $apiSecureKey,
        Attribute\Id\OrganizationId $authenticatingOrganizationId,
        bool $sandbox,
        ?string $baseUri,
        LoggerInterface $logger,
        bool $debug = false
    ) {
        $this->apiAccessId = $apiAccessId;
        $this->apiSecureKey = $apiSecureKey;
        $this->authenticatingOrganizationId = $authenticatingOrganizationId;
        $this->sandbox = $sandbox;
        $this->logger = $logger;

        $baseUri = $baseUri ?: $this->inferBaseUri($sandbox);

        $this->httpClient = (new Factory())->make($apiAccessId, $apiSecureKey, $authenticatingOrganizationId, $baseUri, $logger, $debug);
    }


    /**
     * Determines the base URI
     */
    protected function inferBaseUri(bool $sandbox): string
    {
        if (!$sandbox) {
            return 'https://api.forte.net/v3/';
        }

        return 'https://sandbox.forte.net/api/v3/';
    }


    /**
     * Get's the Organization ID
     */
    public function getAuthenticatingOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->authenticatingOrganizationId;
    }


    /**
     * Get's the HTTP Client
     */
    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }
}
