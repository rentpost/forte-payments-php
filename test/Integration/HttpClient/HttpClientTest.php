<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\HttpClient;

use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Exception\Request\ServerErrorException;
use Rentpost\ForteApi\Model\Transaction;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;

class HttpClientTest extends AbstractIntegrationTest
{

    /**
     * Ensure the correct exception is thrown on Forte 5xx HTTP errors
     */
    public function test500ResponseException()
    {
        $this->expectException(ServerErrorException::class);

        $httpClient = $this->getDirectHttpClient('https://httpstat.us/500'); // Using this url to simulate 5xx

        $httpClient->doRequest(
            'get',
            '',
            Transaction::class
        );
    }


    /**
     * Ensure the correct exception is thrown on Forte 4xx HTTP errors
     */
    public function test400ResponseException()
    {
        $this->expectException(AbstractRequestException::class);

        $httpClient = $this->getDirectHttpClient('https://httpstat.us/400'); // Using this url to simulate 4xx

        $httpClient->doRequest(
            'get',
            '',
            Transaction::class
        );
    }


    /**
     * Ensure the correct exception is thrown on Forte 3xx HTTP response
     * I doubt that Forte ever returns 3xx responses.
     */
    public function test300ResponseException()
    {
        $this->expectException(\Exception::class);

        $httpClient = $this->getDirectHttpClient('https://httpstat.us/301'); // Using this url to simulate 3xx

        $httpClient->doRequest(
            'get',
            '',
            Transaction::class
        );
    }
}
