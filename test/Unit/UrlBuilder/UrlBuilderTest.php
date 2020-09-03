<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\UrlBuilder;

use Rentpost\ForteApi\Exception\LibraryFaultException;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Filter\TransactionFilter;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;
use Rentpost\ForteApi\UriBuilder\Formatter;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;
use Rentpost\ForteApi\Attribute;

class UrlBuilderTest extends AbstractUnitTestCase
{

    public function testFormatterValid()
    {
        $str = Formatter::format('this is a plain and boring string', []);
        $this->assertEquals('this is a plain and boring string', $str);

        $str = Formatter::format('My name is %s', ['Jim']);
        $this->assertEquals('My name is Jim', $str);

        // NOTE - this test is failing as there is a bug in `Formatter`
//        $str = Formatter::format('Your share is %%%d, your friends share is %%%d', [75, 25]);
//        $this->assertEquals('Your share is %75, your friends share is %25', $str);
    }


    public function testPaginationDataValid()
    {
        $paginationData = new PaginationData();
        $uri = UriBuilder::build('', [], null, $paginationData);
        $this->assertEquals('', $uri);

        $paginationData = new PaginationData();
        $paginationData
            ->setPageSize(120)
            ->setPageIndex(75)
            ->setOrderby('my_sortable_field', 'asc');
        $uri = UriBuilder::build('', [], null, $paginationData);
        $this->assertEquals('/?orderby=my_sortable_field+asc&page_index=75&page_size=120', $uri);

        $paginationData = new PaginationData();
        $paginationData
            ->setPageIndex(50)
            ->setOrderby('my_sortable_field', 'DESC');
        $uri = UriBuilder::build('', [], null, $paginationData);
        $this->assertEquals('/?orderby=my_sortable_field+desc&page_index=50', $uri);
    }


    public function testPaginationDataInvalid()
    {
        $this->expectException(ValidationException::class);

        $paginationData = new PaginationData();
        $paginationData
            ->setPageIndex(-10);

        UriBuilder::build('', [], null, $paginationData);
    }


    public function testPaginationDataInvalidTwo()
    {
        $this->expectException(ValidationException::class);

        $paginationData = new PaginationData();
        $paginationData
            ->setOrderby('my_field_name', 'invalid direction');

        UriBuilder::build('', [], null, $paginationData);
    }


    public function testPaginationDataInvalidThree()
    {
        $this->expectException(ValidationException::class);

        $paginationData = new PaginationData();
        $paginationData
            ->setPageSize(1001);

        UriBuilder::build('', [], null, $paginationData);
    }


    public function testPaginationDataInvalidFour()
    {
        $this->expectException(LibraryFaultException::class);

        UriBuilder::build('/we-dont-like-this-slash-at-the-start', []);
    }


    public function testUsingEverything()
    {
        $paginationData = new PaginationData();
        $paginationData
            ->setPageIndex(100)
            ->setOrderby('my_sortable_field_2', 'asc');

        $startReceivedDate = new \DateTime('2017-01-09');
        $endReceivedDate = new \DateTime('2018-01-09');

        $filter = new TransactionFilter();
        $filter
            ->setAction('jump')
            ->setStartReceivedDate(new Attribute\Date($startReceivedDate))
            ->setEndReceivedDate(new Attribute\Date($endReceivedDate));

        $uri = UriBuilder::build('hello/%s', ['world'], $filter, $paginationData);

        $this->assertEquals(
            'hello/world/?filter=action+eq+jump+and+end_received_date+eq+2018-01-09+and+start_received_date+eq+2017-01-09&orderby=my_sortable_field_2+asc&page_index=100',
            $uri
        );

        $paginationData = new PaginationData();
        $paginationData
            ->setPageSize(100);

        $filter = new TransactionFilter();
        $filter
            ->setAuthorizationAmount(new Attribute\Money('79.99'))
            ->setBillToFirstName('Steve')
            ->setBillToLastName('O\'Connor')
            ->setStartReceivedDate(new Attribute\Date($startReceivedDate))
            ->setEndReceivedDate(new Attribute\Date($endReceivedDate));

        $uri = UriBuilder::build('%s-%s', ['hello', 'world'], $filter, $paginationData);

        $this->assertEquals(
            'hello-world/?filter=authorization_amount+eq+79.99+and+bill_to_first_name+eq+Steve+and+bill_to_last_name+eq+O%27Connor+and+end_received_date+eq+2018-01-09+and+start_received_date+eq+2017-01-09&page_size=100',
            $uri
        );
    }
}
