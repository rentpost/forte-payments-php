<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\HttpClient;

use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;

class GuzzleClientTest extends AbstractIntegrationTest
{
    
    /**
     * Test guzzle/curl/php-curl
     */
    public function testTlsSupport()
    {
        $guzzle = new \GuzzleHttp\Client();

        // This URL will return JSON data about our client (Guzzle/curl)
        $response = $guzzle->get('https://www.howsmyssl.com/a/check');

        $data = \GuzzleHttp\json_decode($response->getBody()->__toString(), true);

        $this->assertEquals(
            'TLS 1.2',
            $data['tls_version']
        ); // Forte requires minimum TLS 1.2

        $this->assertContains(
            'TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384',
            $data['given_cipher_suites']
        ); // Forte Preferred cipher
    }
}
