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

    /** @var string */
    protected $apiAccessId;

    /** @var string */
    protected $apiSecureKey;

    /** @var Attribute\Id\OrganizationId */
    protected $authenticatingOrganizationId;

    /** @var bool */
    protected $sandbox;

    /** @var LoggerInterface */
    protected $logger;

    /** @var HttpClient */
    protected $httpClient;


    /**
     * ForteEnvironment constructor.
     *
     * @param string $apiAccessId
     * @param string $apiSecureKey
     * @param Attribute\Id\OrganizationId $authenticatingOrganizationId
     * @param bool $sandbox
     * @param null|string $baseUri Passing null the baseUri will be infered from the sandbox setting (recommended)
     * @param LoggerInterface $logger
     */
    public function __construct(
        string $apiAccessId,
        string $apiSecureKey,
        Attribute\Id\OrganizationId $authenticatingOrganizationId,
        bool $sandbox,
        ?string $baseUri,
        LoggerInterface $logger
    ) {
        $this->apiAccessId = $apiAccessId;
        $this->apiSecureKey = $apiSecureKey;
        $this->authenticatingOrganizationId = $authenticatingOrganizationId;
        $this->sandbox = $sandbox;
        $this->logger = $logger;

        $baseUri = $baseUri ? $baseUri : $this->inferBaseUri($sandbox);

        $this->httpClient = (new Factory())->make($apiAccessId, $apiSecureKey, $authenticatingOrganizationId, $baseUri, $logger);
    }


    /**
     * Determines the base URI
     *
     * @param bool $sandbox
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
