# Forte API v3 PHP Client Library

Forte client library written in PHP for version 3 of the REST API

## Forte API Documentation

https://restdocs.forte.net/

## Installation

Run the following command

```
composer require rentpost/forte-payments-php
```

## Authors and Maintainers

Sam Anthony (On behalf of Rentpost)
<sam@expertcoder.io>
https://github.com/expertcoder

Jacob Thomason
<jacob@rentpost.com>

## Issues / Bugs / Questions

Please feel free to raise an issue against this repository if you have any questions or problems

## Contributing

New contributors to this project are welcome. If you are interested in contributing please
send a courtesy email to dev@rentpost.com

## Testing
### Requirements

Running tests against Forte's sandbox environment will not return back any meaningful results.  Therefore, an additional "livetest" account is needed for running various tests.  This is a real account.  You could use a production account in place of this.  But be aware that, in either case, real money will be moved if used for transaction endpoints.

The following dev composer packages are needed for automated testing.

- "phpunit/phpunit" (version 7.0+)
- "vladahejda/phpunit-assert-exception" for `assertException` and related trait

PHPUnit is used for both unit tests, and integration test (Testing actual
API calls to Forte)

### Configuration

The integration tests require some settings. This is done via the `test/settings.php` file.  See `Test\settings.php.dist` as an example.

### Running

Before running tests, you'll need to be sure all vendor packages are installed via `Composer`.  To do so, run `composer install` first.  Then you can run tests as follows (`testsuite` flag optional):

```
./vendor/bin/phpunit --testsuite Unit 
```

## License

This library is released under the MIT license.
