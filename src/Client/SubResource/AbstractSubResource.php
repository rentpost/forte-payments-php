<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\ForteEnvironment;
use Rentpost\ForteApi\HttpClient\HttpClient;

/**
 * Abstract class for SubResource(s)
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractSubResource
{

    private ForteEnvironment $forteEnvironment;


    /**
     * Constructor
     */
    public function __construct(ForteEnvironment $forteEnvironment)
    {
        $this->forteEnvironment = $forteEnvironment;
    }


    /**
     * Gets the Forte environment
     */
    protected function getForteEnvironment(): ForteEnvironment
    {
        return $this->forteEnvironment;
    }


    /**
     * Gets the HTTP client
     */
    protected function getHttpClient(): HttpClient
    {
        return $this->forteEnvironment->getHttpClient();
    }


    /**
     * Gets the Organization ID
     */
    public function getAuthOrgId(): Attribute\Id\OrganizationId
    {
        return $this->getForteEnvironment()->getAuthenticatingOrganizationId();
    }
}
