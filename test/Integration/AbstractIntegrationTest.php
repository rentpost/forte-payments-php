<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Client\ForteClient;
use Rentpost\ForteApi\File\Logger\Factory as FileLoggerFactory;
use Rentpost\ForteApi\HttpClient\HttpClient;
use Rentpost\ForteApi\Test\AbstractTestCase;
use Rentpost\ForteApi\Test\UserSettings;
use Rentpost\ForteApi\Void\Logger as VoidLogger;

/**
 * Base Integration Test Class
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractIntegrationTest extends AbstractTestCase
{

    protected function getAllSettingsFromFile(): array
    {
        return get_forte_settings();
    }


    /**
     * Gets the ForteClient
     */
    protected function getForteClient(): ForteClient
    {
        $logDir = UserSettings::getLogLocation();
        $logger = (new FileLoggerFactory($logDir))->make('forte');

        $allSettings = $this->getAllSettingsFromFile();

        return (new \Rentpost\ForteApi\Client\Factory)->make($allSettings, $logger);
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
            new VoidLogger(),
            $settings['debug'],
        );
    }
}
