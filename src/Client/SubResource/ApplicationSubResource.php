<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Filter\ApplicationFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;


/**
 * Application resources
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class ApplicationSubResource extends AbstractSubResource
{

    /**
     * Creates an application
     *
     * @note we always use the reseller org id - only resllers can create applications
     *
     * @see https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#application
     *
     * @param Model\Application $application
     */
    public function create(Model\Application $application): Model\Application
    {
        $uri = UriBuilder::build('organizations/%s/applications', [ $this->getAuthOrgId()->getValue() ]);

        return $this->getHttpClient()->makeModelRequest('post', $uri, Model\Application::class, $application);
    }


    /**
     * Finds an application
     *
     * @note we always use the reseller org id - only resllers can create applications
     *
     * @see https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#application
     *
     * @param Attribute\Id\ApplicationId $applicationId
     */
    public function findOne(Attribute\Id\ApplicationId $applicationId): ?Model\Application
    {
        $uri = UriBuilder::build('organizations/%s/applications/%s', [
            $this->getAuthOrgId()->getValue(),
            $applicationId->getValue(),
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\Application::class, null);
    }


    /**
     * Finds a collection of applications
     *
     * @note we always use the reseller org id - only resllers can create applications
     *
     * @see https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#application
     *
     * @param ApplicationFilter|null $filter
     * @param PaginationData|null $paginationData
     */
    public function find(
        ?ApplicationFilter $filter = null,
        ?PaginationData $paginationData = null
    ): Model\ApplicationCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/applications',
            [ $this->getAuthOrgId()->getValue() ],
            $filter,
            $paginationData
        );

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\ApplicationCollection::class, null);
    }
}
