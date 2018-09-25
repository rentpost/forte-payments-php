<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client;

use Psr\Log\LoggerInterface;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Exception\LibraryGenericException;
use Rentpost\ForteApi\ForteEnvironment;

/**
 * Forte Client Factory
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Factory
{

    /**
     * @param array $settings Nested associative array, see `settings.php.dist`
     * @param LoggerInterface $logger
     */
    public function make(array $settings, LoggerInterface $logger): ForteClient
    {
        if (empty($settings['environments'])) {
            $this->throwException('environments');
        }

        /** @var ForteEnvironment[] $environments */
        $environments = [];

        foreach ($settings['environments'] as $envName => $envSettings) {
            if (is_numeric($envName)) {
                throw new LibraryGenericException('environment array should not use numeric keys');
            }

            if (empty($envSettings['access_id'])) {
                throw new LibraryGenericException('array key "environment.access_id" must be provided');
            }

            if (empty($envSettings['secure_key'])) {
                throw new LibraryGenericException('array key "environment.secure_key" must be provided');
            }

            if (empty($envSettings['authenticating_organization_id'])) {
                throw new LibraryGenericException('array key "environment.authenticating_organization_id" must be provided');
            }

            if (!isset($envSettings['sandbox'])) {
                throw new LibraryGenericException('array key "environment.sandbox" must be provided');
            }

            $baseUri = $envSettings['base_uri'] ?? null;  // Optional setting

            $environments[$envName] = new ForteEnvironment(
                $envSettings['access_id'],
                $envSettings['secure_key'],
                new Attribute\Id\OrganizationId($envSettings['authenticating_organization_id']),
                $envSettings['sandbox'],
                $baseUri,
                $logger
            );
        }

        $overrideSubResourceEnvironments = $settings['override_sub_resource_environments'] ?? [];

        $defaultEnvironment = array_shift($environments);

        return new ForteClient($defaultEnvironment, $environments, $overrideSubResourceEnvironments);
    }
}
