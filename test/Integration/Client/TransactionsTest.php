<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\Filter\TransactionFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;

class TransactionsTest extends AbstractIntegrationTest
{

    protected const START_RECEIVED_DATE = '2018-01-01';


    public function testModelValidation()
    {

        $this->expectException(ValidationException::class);

        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $transaction = new Model\Transaction();

        // Expecting an exception
        $client->useTransactions()->create($organizationId, $locationId, $transaction);
    }


    /**
     * Tests creating a transaction
     */
    public function testCreate()
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $billingAddress = new Model\Address();
        $billingAddress
            ->setFirstName('Paul')
            ->setLastName('Green');

        $card = new Model\Card();
        $card
            ->setCardType('visa')
            ->setExpireYear(2021)
            ->setExpireMonth(1)
            ->setNameOnCard('Paul Green')
            ->setAccountNumber('4111111111111111');


        $lineItems = new Model\LineItems();
        $lineItems
            ->setLineItemHeader(new Attribute\CommaList(['SKU', 'Price', 'Qty']))
            ->addLineItem(new Attribute\CommaList(['021000021', '45.00', '2']))
            ->addLineItem(new Attribute\CommaList(['021000021', '36.99', '10']))
            ->addLineItem(new Attribute\CommaList(['021000023', '27.50', '7']));

        $xdata = new Model\Xdata();
        $xdata
            ->addXdata('some xdata one')
            ->addXdata('some xdata two');


        $transaction = new Model\Transaction();
        $transaction
            ->setAction('sale')
            ->setCustomerIpAddress(new Attribute\IpAddress('100.10.11.123'))
            ->setBillingAddress($billingAddress)
            ->setCard($card)
            ->setLineItems($lineItems)
            ->setXdata($xdata);

        $transaction->setAuthorizationAmount(new Attribute\Money('109.49'));

        $returnedTransaction = $client->useTransactions()->create($organizationId, $locationId, $transaction);

        $this->assertTransactionModel($returnedTransaction, true);

        return $returnedTransaction->getTransactionId();
    }


    public function testVerify()
    {
        $client = $this->getForteClient();

        // $organizationId = UserSettings::getLivetestMerchantOrganizationId();
        // $locationId = UserSettings::getLivetestMerchantLocationId();
        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $billingAddress = new Model\Address();
        $billingAddress
            ->setFirstName('Paul')
            ->setLastName('Green');

        $eCheck = new Model\Echeck();
        $eCheck
            // ->setSecCode('WEB')
            ->setAccountType('Checking')
            ->setRoutingNumber(new Attribute\BankRoutingNumber('021000021'))
            ->setAccountNumber(new Attribute\BankAccountNumber('123456'))
            ->setAccountHolder('John Smith');


        $lineItems = new Model\LineItems();
        $lineItems
            ->setLineItemHeader(new Attribute\CommaList(['SKU', 'Price', 'Qty']))
            ->addLineItem(new Attribute\CommaList(['021000021', '45.00', '2']))
            ->addLineItem(new Attribute\CommaList(['021000021', '36.99', '10']))
            ->addLineItem(new Attribute\CommaList(['021000023', '27.50', '7']));

        $xdata = new Model\Xdata();
        $xdata
            ->addXdata('some xdata one')
            ->addXdata('some xdata two');


        $transaction = new Model\Transaction();
        $transaction
            ->setAction('verify')
            ->setCustomerIpAddress(new Attribute\IpAddress('100.10.11.123'))
            ->setBillingAddress($billingAddress)
            ->setEcheck($eCheck)
            ->setLineItems($lineItems)
            ->setXdata($xdata);

        $transaction->setAuthorizationAmount(new Attribute\Money('00.01')); // Need to send at least 1 cent to verify (person will not be chargd this amount)

        $returnedTransaction = $client->useTransactions()->create($organizationId, $locationId, $transaction);

        return $returnedTransaction->getTransactionId();
    }


    /**
     * @expectedException \Rentpost\ForteApi\Exception\Request\TimeoutException
     */
    public function testFindOneWaitFail()
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();
        $invalidTransactionId = new Attribute\Id\TransactionId('trn_aaaabbbb-aaaa-1111-86a9-aaaabbbbcccc');

        $transaction = $client->useTransactions()->findOneWait($organizationId, $locationId, $invalidTransactionId);
    }


    /**
     * @depends testCreate
     */
    public function testFindOne(Attribute\Id\TransactionId $transactionId): Model\Transaction
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $transaction = $client->useTransactions()->findOneWait($organizationId, $locationId, $transactionId);

        $this->assertNotEmpty($transaction, 'Attempted a few times to get transaction from API, it should have succeeded by now');

        $this->assertTransactionModel($transaction, false);

        return $transaction;
    }


    /**
     * @depends testFindOne
     * after `testFindOne` has ran, we know for sure the new item inserted in available from the API
     */
    public function testFindListAll()
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $tomorrow = (new \DateTime())->add(\DateInterval::createFromDateString('1 day'));

        $filter = new TransactionFilter();
        $filter->setStartReceivedDate(new Attribute\Date(self::START_RECEIVED_DATE));
        $filter->setEndReceivedDate(new Attribute\Date($tomorrow));

        $transactionCollection = $client->useTransactions()->find($organizationId, $locationId, $filter);

        $this->assertInstanceOf(Model\TransactionCollection::class, $transactionCollection);

        foreach ($transactionCollection->getResults() as $transaction) {
            $this->assertInstanceOf(Model\Transaction::class, $transaction);
        }

        return $transactionCollection->getNumberResults();
    }


    /**
     * We want to run this after `testFindOne` which is ran after `testCreate`. At that stage we will know a new
     * entry has just been inserted
     * @depends testFindListAll
     */
    public function testFindListFilterValid(int $countEntireList)
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $pagination = new PaginationData();

        //Intentionally putting the data range not to select the most recently inserted record,
        //Then we can check if the count is any differnt to test the filter
        $yestarday = (new \DateTime())->sub(\DateInterval::createFromDateString('1 day'));

        $filter = new TransactionFilter();
        $filter->setStartReceivedDate(new Attribute\Date(self::START_RECEIVED_DATE));
        $filter->setEndReceivedDate(new Attribute\Date($yestarday));

        $transactionCollection = $client->useTransactions()->find($organizationId, $locationId, $filter, $pagination);

        $this->assertInstanceOf(Model\TransactionCollection::class, $transactionCollection);

        $countFilteredList = $transactionCollection->getNumberResults();

        $this->assertGreaterThan(
            $countFilteredList,
            $countEntireList,
            'This filtered list should have less results, as it should exclude the item we added just a few moments ago'
        );
    }


    /**
     * @depends testFindOne
     * after `testFindOne` has ran, we know for sure the new item inserted in available from the API
     */
    public function testVoid(Model\Transaction $transaction)
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $returnedTransaction = $client->useTransactions()->void(
            $organizationId,
            $locationId,
            $transaction
        );

        $this->assertInstanceOf(Model\Transaction::class, $returnedTransaction);
    }


    protected function assertTransactionModel(Model\Transaction $returnedTransaction, bool $isCreate)
    {
        $this->assertInstanceOf(Model\Transaction::class, $returnedTransaction);
        $this->assertInstanceOf(Model\Response::class, $returnedTransaction->getResponse());
        $this->assertInstanceOf(Model\Address::class, $returnedTransaction->getBillingAddress());
//        $this->assertInstanceOf(Model\Echeck::class, $returnedTransaction->getEcheck());
        $this->assertInstanceOf(Model\LineItems::class, $returnedTransaction->getLineItems());
        $this->assertInstanceOf(Model\Xdata::class, $returnedTransaction->getXdata());

        $this->assertInstanceOf(Attribute\Id\TransactionId::class, $returnedTransaction->getTransactionId());
        $this->assertInstanceOf(Attribute\Id\LocationId::class, $returnedTransaction->getLocationId());
        $this->assertInstanceOf(Attribute\Money::class, $returnedTransaction->getAuthorizationAmount());

        $this->assertEquals('sale', $returnedTransaction->getAction());
        $this->assertEquals('109.49', $returnedTransaction->getAuthorizationAmount()->getValue());
        $this->assertEquals(['some xdata one', 'some xdata two'], $returnedTransaction->getXdata()->getXdatas());
        $this->assertEquals('SKU,Price,Qty', $returnedTransaction->getLineItems()->getLineItemHeader()->getValue());
        $this->assertEquals('Paul', $returnedTransaction->getBillingAddress()->getFirstName());

        $lineItemsExpected = ['021000021,45.00,2', '021000021,36.99,10', '021000023,27.50,7'];
        $i = 0;
        foreach($returnedTransaction->getLineItems()->getLineItems() as $lineItem) {
            $this->assertInstanceOf(Attribute\CommaList::class, $lineItem);
            $this->assertEquals($lineItemsExpected[$i], $lineItem->getValue());
            $i++;
        }
    }
}
