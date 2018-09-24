<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client;

use Rentpost\ForteApi\Client\SubResource\AbstractSubResource;
use Rentpost\ForteApi\Exception\LibraryGenericException;
use Rentpost\ForteApi\ForteEnvironment;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

class ForteClient
{

    protected const DEFAULT_ENVIRONMENT_NAME = '_default_';

    /**
     * @var AbstractSubResource[]
     */
    protected $subResources;

    /**
     * @var ForteEnvironment[]
     */
    protected $environments;


    public function __construct(
        ForteEnvironment $defaultEnvironment,
        array $alternativeEnvironments = [],
        array $overrideSubResourceEnvironments = []
    )
    {
        $this->addForteEnvironment(self::DEFAULT_ENVIRONMENT_NAME, $defaultEnvironment);

        foreach ($alternativeEnvironments as $name => $environment) {
            $this->addForteEnvironment($name, $environment);
        }

        $this->initSubResources($overrideSubResourceEnvironments);
    }


    private function addForteEnvironment(string $name, ForteEnvironment $environment)
    {
        $this->environments[$name] = $environment;
    }


    protected function getForteEnvironment($name): ForteEnvironment
    {
        if (!isset($this->environments[$name])) {
            throw new LibraryGenericException('Cannot find forte environment with name `' . $name . '`');
        }

        return $this->environments[$name];
    }


    public function generateRiskSessionId(): string
    {
        // see: https://www.forte.net/devdocs/api_resources/forte_api_v3.htm#application   (risk_session_id)
        return preg_replace('~[^a-zA-Z0-9]~', '', uniqid('rsi', true) );
    }


    public function getRiskSessionJavascriptUrl(string $riskSessionId): string
    {
        return 'https://img3.forte.net/fp/tags.js?org_id=xdzpgyj7&session_id=' . $riskSessionId . 'pageid=1';
    }


    protected function initSubResources(array $overrideSubResourceEnvironments)
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


    protected function inferSubResourceClassName(string $subResource): string
    {
        $converter = new CamelCaseToSnakeCaseNameConverter(null, false);
        $part = $converter->denormalize($subResource);

        return 'Rentpost\\ForteApi\\Client\\SubResource\\' . $part . 'SubResource';
    }


    /**
     * @return SubResource\TransactionSubResource
     */
    public function useTransactions(): SubResource\TransactionSubResource
    {
        return $this->subResources['transaction'];
    }


    /**
     * @return SubResource\ScheduleSubResource
     */
    public function useSchedules(): SubResource\ScheduleSubResource
    {
        return $this->subResources['schedule'];
    }


    /**
     * @return SubResource\ScheduleItemSubResource
     */
    public function useSchedualItems(): SubResource\ScheduleItemSubResource
    {
        return $this->subResources['schedule_item'];
    }


    /**
     * @return SubResource\SettlementSubResource
     */
    public function useSettlements(): SubResource\SettlementSubResource
    {
        return $this->subResources['settlement'];
    }


    /**
     * @return SubResource\FundingSubResource
     */
    public function useFundings(): SubResource\FundingSubResource
    {
        return $this->subResources['funding'];
    }


    /**
     * @return SubResource\CustomerSubResource
     */
    public function useCustomers(): SubResource\CustomerSubResource
    {
        return $this->subResources['customer'];
    }


    /**
     * @return SubResource\AddressSubResource
     */
    public function useAddresses(): SubResource\AddressSubResource
    {
        return $this->subResources['address'];
    }


    /**
     * @return SubResource\PayMethodSubResource
     */
    public function usePayMethods(): SubResource\PayMethodSubResource
    {
        return $this->subResources['pay_method'];
    }


    /**
     * @return SubResource\DisputeSubResource
     */
    public function useDisputes(): SubResource\DisputeSubResource
    {
        return $this->subResources['dispute'];
    }


    /**
     * @return SubResource\ApplicationSubResource
     */
    public function useApplications(): SubResource\ApplicationSubResource
    {
        return $this->subResources['application'];
    }


    /**
     * @return SubResource\DocumentSubResource
     */
    public function useDocuments(): SubResource\DocumentSubResource
    {
        return $this->subResources['document'];
    }
}
