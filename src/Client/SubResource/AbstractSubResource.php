<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\ForteEnvironment;
use Rentpost\ForteApi\HttpClient\HttpClient;

/**
 * Abstract class for SubResource(s)
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
abstract class AbstractSubResource
{

    /** @var ForteEnvironment */
    private $forteEnvironment;


    /**
     * Constructor
     *
     * @param ForteEnvironment $forteEnvironment
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
    protected function getAuthOrgId(): string
    {
        return $this->getForteEnvironment()->getAuthenticatingOrganizationId()->getValue();
    }
}
