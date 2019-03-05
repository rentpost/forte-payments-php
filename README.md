# Forte API v3 PHP Client Library

Forte client library written in PHP for version 3 of the REST API

## Forte API Documentation

https://restdocs.forte.net/

## Installation

Run the following command to include this library within your project

```
composer require rentpost/forte-payments-php
```

## Configuration

You'll first want to create a configuration file that defines your environments and their respective
configuration settings.  As an example, we're showing a Symfony service container config.  However,
this is just passing an array in the following format:

```php
[
  'environments' => [
    'sandbox' => [
      'access_id' => 'xxxxxxxx',
      'secure_key' => 'xxxxxxxx',
      ...
    ]
  ],
  'override_sub_resource_environments' => [
    'address' => 'env_name',
    'application' => 'env_name',
    ...
  ]
]
```

*It's important to note that Forte's sandbox is quite limited for many resources.  Therefore, it's
possible to override which environment is used for certain "sub resources"
(API resources/endpoints)*

### Development Environments

An example Symfony service container yaml configuration for a development environment, using a
"livetest" environemnt with specific sub resource overrides.

```yaml
parameters:
  forte_api_client_settings:
    environments:
      sandbox:
        access_id: "%forte_api_default_access_id%"
        secure_key: "%forte_api_default_secure_key%"
        authenticating_organization_id: "%forte_api_default_authenticating_organization_id%"
        sandbox: "%forte_api_default_sandbox%"
        base_uri: ~
        debug: false
      livetest:
        access_id: "%forte_api_livetest_access_id%"
        secure_key: "%forte_api_livetest_secure_key%"
        authenticating_organization_id: "%forte_api_livetest_authenticating_organization_id%"
        sandbox: "%forte_api_livetest_sandbox%"
        base_uri: ~
        debug: false

    override_sub_resource_environments:
      address: livetest
      application: livetest
      customer: livetest
      dispute: livetest
      document: livetest
      funding: livetest
      pay_method: livetest
      schedule_item: livetest
      settlement: livetest
      transaction: ~
```

### Production Environments

A simple Symfony service container configuration for a production environemtn without any
necessary overrides.

```yaml
parameters:
  forte_api_client_settings:
    environments:
      live:
        access_id: "%forte_api_default_access_id%"
        secure_key: "%forte_api_default_secure_key%"
        authenticating_organization_id: "%forte_api_default_authenticating_organization_id%"
        sandbox: "%forte_api_default_sandbox%"
        base_uri: ~
        debug: false

    override_sub_resource_environments: ~
```

## Usage

Here is an example credit card 'sale' transaction.

### PSR Logger

We first create a dummy logger.  Feel free to use any PSR compliant logger.  This is used when
debugging is enabled in the configuration.  Otherwise, all Exceptions will surface and must be caught.

```php
use Psr\Log\LoggerInterface;

namespace Acme\File;

class Logger implements LoggerInterface
{

  public function log($level, $message, array $context = []) {
    // Handle logging
  }

  // Other interface methods
}
```

### Create Transaction

To use, you'll want to call the `Rentpost\ForteApi\Client\Factory::make` method which will give you
a `Rentpost\ForteApi\Client\ForteClient` object.  The `ForteClient` object provides access to all
"sub resources" (Forte API endpoint/resources).

The library makes use of `Model` and `Attribute` objects which assist with validation and
serialization.  Any complex values will make use of an `Attribute`.  A `Model` is an object
representation of a Forte API resource and all required and optional parameters.

```php
use Acme\File\Logger as FileLogger;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Client\Factory as ForteApiClientFactory;
use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Model;

// The first parameter is our settings array.  See the "Configuration" section
$settings = [
  'environments' => [
    'sandbox' => [
      'access_id' => 'xxxxxxxx',
      'secure_key' => 'xxxxxxxx',
      ...
    ]
  ],
  'override_sub_resource_environments' => [
    'address' => 'env_name',
    'application' => 'env_name',
    ...
  ]
];

$logger = new FileLogger();

$forteClient = new ForteApiClientFactory($settings, $logger);

$organizationId = new Attribute\Id\OrganizationId('org_123456');
$locationId = new Attribute\Id\LocationId('loc_123456');

$card = new Model\Card();
$card->setCardType('visa')
  ->setNameOnCard('John Doe')
  ->setAccountNumber('1234567890')
  ->setExpireMonth('01')
  ->setExpireYear('2019')
  ->setCardVerificationValue('123');

$address = new Model\PhysicalAddress();
  ->setStreetLine1('123 Foo St.')
  ->setStreetLine2('Apt. 123')
  ->setLocality('New York') // City/town/village
  ->setRegion('NY') // State or province
  ->setPostalCode(new Attribute\PostalCode('12345'));

$transaction = new Model\Transaction();
$transaction->setAction('sale')
  ->setCard($card) // Or setEcheck for ACH
  ->setBillingAddress($address)
  ->setOrderNumber('PO-12345')
  ->setAuthorizationAmount(new Attribute\Money('100.00'))
  ->setCustomerIpAddress(new Attribute\IpAddress('192.168.0.1'));

try {
  $forteClient->useTransactions()->create(
    $organizationId,
    $locationId,
    $transaction
  );
} catch (AbstractRequestException $e) {
  $logger->log($e->getModel()->getResponse()->getResponseDesc());

  throw $e;
}

```

## Testing

This library makes use of `make` recipes to execute all necessary commands.  To view a list of
recipes just execute `make`.

### Requirements

Running tests against Forte's sandbox environment will not return back any meaningful results for
many resources.  Therefore, an additional "livetest" account is needed for running various tests.
This is a real account.  You could use a production account in place of this (not advised).  But be
aware that, in either case, real money will be moved if used for transaction endpoints.  Forte can
setup a "livetest" account for you if needed with very low transaction limits to prevent mistakes.

The following dev composer packages are required for automated testing.

- "phpunit/phpunit" (version 7.0+)
- "vladahejda/phpunit-assert-exception" for `assertException` and related trait

PHPUnit is used for both unit tests, and integration test (Testing actual API calls to Forte)

### Configuration

The integration tests require some settings. This is done via the `test/settings.php` file.  See `test/settings.php.dist` as an example.

### Running

Before running tests, you'll need to be sure the project is initialized and vendor packages are
installed via `Composer`.  To do so, run `make init` first.  Then you can run tests as follows:

```
make test
```

## Issues / Bugs / Questions

Please feel free to raise an issue against this repository if you have any questions or problems

## Todo

There are still a few "sub resource" classes (read: Forte endpoints/resources)that haven't been completed/aren't supported yet.  This is simply because we aren't using these.  Feel free to submit these as a pull request, or issue ticket if necessary.

## Contributing

New contributors to this project are welcome. If you are interested in contributing please
send a courtesy email to dev@rentpost.com

## Authors and Maintainers

- Jacob Thomason <jacob@rentpost.com>
- Sam Anthony <sam@expertcoder.io>

## License

This library is released under the MIT license.
