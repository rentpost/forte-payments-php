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

        // Forte requires minimum TLS 1.2
        $this->assertGreaterThanOrEqual('1.2', \str_replace('TLS', '', $data['tls_version']));

        $this->assertContains(
            'TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384',
            $data['given_cipher_suites'],
        ); // Forte Preferred cipher
    }
}
