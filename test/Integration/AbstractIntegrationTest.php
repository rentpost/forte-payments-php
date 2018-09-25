<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Client\ForteClient;
use Rentpost\ForteApi\Exception\LibraryGenericException;
use Rentpost\ForteApi\HttpClient\HttpClient;
use Rentpost\ForteApi\Test\AbstractTestCase;
use Rentpost\ForteApi\Logger\VoidLogger;
use Rentpost\ForteApi\Logger\Factory as LoggerFactory;
use Symfony\Component\Yaml\Yaml;
use Rentpost\ForteApi\Test\UserSettings;

abstract class AbstractIntegrationTest extends AbstractTestCase
{
    
    protected function getAllSettingsFromFile(): array
    {
        return get_forte_settings();
    }

    
    protected function getForteClient(): ForteClient
    {
        $logDir = UserSettings::getLogLocation();
        $logger = (new LoggerFactory($logDir))->makeFileLogger('forte');

        $allSettings = $this->getAllSettingsFromFile();

        $forteClient = (new \Rentpost\ForteApi\Client\Factory())->make($allSettings, $logger);

        return $forteClient;
    }


    /**
     * To test things like malformed JSON and 500 requests etc,
     * we need direct access to HttpClient
     */
    protected function getDirectHttpClient(string $baseUrl): HttpClient
    {
        $settingsAllEnvironments = $this->getAllSettingsFromFile();

        $settings = $settingsAllEnvironments['environments']['sandbox'];

        return (new \Rentpost\ForteApi\HttpClient\Factory())->make(
            $settings['access_id'],
            $settings['secure_key'],
            new Attribute\Id\OrganizationId($settings['authenticating_organization_id']),
            $baseUrl,
            new VoidLogger()
        );
    }
}
