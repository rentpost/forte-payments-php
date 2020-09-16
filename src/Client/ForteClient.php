<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client;

use Rentpost\ForteApi\Client\SubResource\AddressSubResource;
use Rentpost\ForteApi\Client\SubResource\ApplicationSubResource;
use Rentpost\ForteApi\Client\SubResource\CustomerSubResource;
use Rentpost\ForteApi\Client\SubResource\DisputeSubResource;
use Rentpost\ForteApi\Client\SubResource\DocumentSubResource;
use Rentpost\ForteApi\Client\SubResource\FundingSubResource;
use Rentpost\ForteApi\Client\SubResource\LocationSubResource;
use Rentpost\ForteApi\Client\SubResource\PayMethodSubResource;
use Rentpost\ForteApi\Client\SubResource\ScheduleItemSubResource;
use Rentpost\ForteApi\Client\SubResource\ScheduleSubResource;
use Rentpost\ForteApi\Client\SubResource\SettlementSubResource;
use Rentpost\ForteApi\Client\SubResource\TransactionSubResource;
use Rentpost\ForteApi\Exception\LibraryGenericException;
use Rentpost\ForteApi\ForteEnvironment;


/**
 * This is the main entry class/client for accessing this library
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 * @author Sam Anthony <sam@rentpost.com>
 */
class ForteClient
{

    /** @var ForteEnvironment[] */
    protected array $environments;


    /**
     * Constructor
     *
     * @param ForteEnvironment[] $environments    List of environments by name/key identifiers
     *                                            to make it easier to identify when using sub-resources
     */
    public function __construct(array $environments)
    {
        foreach ($environments as $name => $environment) {
            $this->addForteEnvironment($name, $environment);
        }
    }


    /**
     * Adds an environment to support
     */
    protected function addForteEnvironment(string $name, ForteEnvironment $environment): void
    {
        $this->environments[$name] = $environment;
    }


    /**
     * Gets the ForteEnvironment
     *
     * @param string #env   The name/key/identifier passed in when instantiating the ForteClient
     */
    protected function getForteEnvironment(string $env): ForteEnvironment
    {
        if (!isset($this->environments[$env])) {
            throw new LibraryGenericException('Unable to locate a ForteEnvironment identified by: ' . $env);
        }

        return $this->environments[$env];
    }


    /**
     * Generates the risk session id
     *
     * @see https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#application (risk_session_id)
     */
    public function generateRiskSessionId(): string
    {
        return preg_replace('~[^a-zA-Z0-9]~', '', uniqid('rsi', true));
    }


    /**
     * Gets the URL for the risk session id
     */
    public function getRiskSessionJavascriptUrl(string $riskSessionId): string
    {
        return 'https://img3.forte.net/fp/tags.js?org_id=xdzpgyj7&session_id=' . $riskSessionId . 'pageid=1';
    }


    /**
     * Uses the transactions sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useTransactions(string $env): TransactionSubResource
    {
        return new TransactionSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the schedule sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useSchedules(string $env): ScheduleSubResource
    {
        return new ScheduleSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the schedule item sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useScheduleItems(string $env): ScheduleItemSubResource
    {
        return new ScheduleItemSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the settlement sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useSettlements(string $env): SettlementSubResource
    {
        return new SettlementSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the funding sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useFundings(string $env): FundingSubResource
    {
        return new FundingSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the location sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useLocations(string $env): LocationSubResource
    {
        return new LocationSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the customer sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useCustomers(string $env): CustomerSubResource
    {
        return new CustomerSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the address sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useAddresses(string $env): AddressSubResource
    {
        return new AddressSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the pay method sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function usePayMethods(string $env): PayMethodSubResource
    {
        return new PayMethodSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the dispute sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useDisputes(string $env): DisputeSubResource
    {
        return new DisputeSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the application sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useApplications(string $env): ApplicationSubResource
    {
        return new ApplicationSubResource($this->getForteEnvironment($env));
    }


    /**
     * Uses the document sub resource
     *
     * @param string $env   ForteEnvironment name/key/identifier
     */
    public function useDocuments(string $env): DocumentSubResource
    {
        return new DocumentSubResource($this->getForteEnvironment($env));
    }
}
