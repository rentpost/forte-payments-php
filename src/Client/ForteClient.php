<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client;

use Rentpost\ForteApi\Client\SubResource\AbstractSubResource;
use Rentpost\ForteApi\Exception\LibraryGenericException;
use Rentpost\ForteApi\ForteEnvironment;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;


/**
 * This is the main entry class/client for accessing this library
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class ForteClient
{

    protected const DEFAULT_ENVIRONMENT_NAME = '_default_';

    /** @var AbstractSubResource[] */
    protected $subResources;

    /** @var ForteEnvironment[] */
    protected $environments;


    /**
     * Constructor
     *
     * @param ForteEnvironment $defaultEnvironment
     * @param array $alternativeEnvironments
     * @param array $overrideSubResourceEnvironments
     */
    public function __construct(
        ForteEnvironment $defaultEnvironment,
        array $alternativeEnvironments = [],
        array $overrideSubResourceEnvironments = []
    ) {
        $this->addForteEnvironment(self::DEFAULT_ENVIRONMENT_NAME, $defaultEnvironment);

        foreach ($alternativeEnvironments as $name => $environment) {
            $this->addForteEnvironment($name, $environment);
        }

        $this->initSubResources($overrideSubResourceEnvironments);
    }


    /**
     * Adds an environment to support
     *
     * @param string $name
     * @param ForteEnvironment $environment
     */
    private function addForteEnvironment(string $name, ForteEnvironment $environment): void
    {
        $this->environments[$name] = $environment;
    }


    /**
     * Gets a given environment by name
     *
     * @param string $name
     */
    protected function getForteEnvironment(string $name): ForteEnvironment
    {
        if (!isset($this->environments[$name])) {
            throw new LibraryGenericException('Cannot find forte environment with name `' . $name . '`');
        }

        return $this->environments[$name];
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
     *
     * @param string $riskSessionId
     */
    public function getRiskSessionJavascriptUrl(string $riskSessionId): string
    {
        return 'https://img3.forte.net/fp/tags.js?org_id=xdzpgyj7&session_id=' . $riskSessionId . 'pageid=1';
    }


    /**
     * Initializes all the necessary sub resources
     *
     * @param array $overrideSubResourceEnvironments
     */
    protected function initSubResources(array $overrideSubResourceEnvironments): void
    {
        $subResourceList = [
            'address',
            'application',
            'customer',
            'dispute',
            'document',
            'funding',
            'pay_method',
            'schedule_item',
            'settlement',
            'transaction',
        ];

        foreach ($overrideSubResourceEnvironments as $subResource => $environment) {
            if (!in_array($subResource, $subResourceList)) {
                throw new LibraryGenericException('You have passed a sub resource which does not exist');
            }
        }

        foreach ($subResourceList as $subResource) {
            $subResourceFqns = $this->inferSubResourceClassName($subResource);

            if (!empty($overrideSubResourceEnvironments[$subResource])) {
                $environment = $this->getForteEnvironment($overrideSubResourceEnvironments[$subResource]);
            } else {
                $environment = $this->getForteEnvironment(self::DEFAULT_ENVIRONMENT_NAME);
            }

            $this->subResources[$subResource] = new $subResourceFqns($environment);
        }
    }


    /**
     * Determines the sub resource FQCN
     *
     * @param string $subResource
     */
    protected function inferSubResourceClassName(string $subResource): string
    {
        $converter = new CamelCaseToSnakeCaseNameConverter(null, false);
        $part = $converter->denormalize($subResource);

        return 'Rentpost\\ForteApi\\Client\\SubResource\\' . $part . 'SubResource';
    }


    /**
     * Uses the transactions sub resource
     */
    public function useTransactions(): SubResource\TransactionSubResource
    {
        return $this->subResources['transaction'];
    }


    /**
     * Uses the schedule sub resource
     */
    public function useSchedules(): SubResource\ScheduleSubResource
    {
        return $this->subResources['schedule'];
    }


    /**
     * Uses the schedule item sub resource
     */
    public function useSchedualItems(): SubResource\ScheduleItemSubResource
    {
        return $this->subResources['schedule_item'];
    }


    /**
     * Uses the settlement sub resource
     */
    public function useSettlements(): SubResource\SettlementSubResource
    {
        return $this->subResources['settlement'];
    }


    /**
     * Uses the funding sub resource
     */
    public function useFundings(): SubResource\FundingSubResource
    {
        return $this->subResources['funding'];
    }


    /**
     * Uses the customer sub resource
     */
    public function useCustomers(): SubResource\CustomerSubResource
    {
        return $this->subResources['customer'];
    }


    /**
     * Uses the address sub resource
     */
    public function useAddresses(): SubResource\AddressSubResource
    {
        return $this->subResources['address'];
    }


    /**
     * Uses the pay method sub resource
     */
    public function usePayMethods(): SubResource\PayMethodSubResource
    {
        return $this->subResources['pay_method'];
    }


    /**
     * Uses the dispute sub resource
     */
    public function useDisputes(): SubResource\DisputeSubResource
    {
        return $this->subResources['dispute'];
    }


    /**
     * Uses the application sub resource
     */
    public function useApplications(): SubResource\ApplicationSubResource
    {
        return $this->subResources['application'];
    }


    /**
     * Uses the document sub resource
     */
    public function useDocuments(): SubResource\DocumentSubResource
    {
        return $this->subResources['document'];
    }
}
