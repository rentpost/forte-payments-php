# Forte API v3 PHP Client Library

Forte client library written in PHP for version 3 of the REST API

## Forte API Documentation

https://restdocs.forte.net/

## Installation

Run the following command to include this library within your project

```
composer require rentpost/forte-payments-php
```

## Authors and Maintainers

- Jacob Thomason <jacob@rentpost.com>
- Sam Anthony <sam@expertcoder.io>

## Issues / Bugs / Questions

Please feel free to raise an issue against this repository if you have any questions or problems

## Contributing

New contributors to this project are welcome. If you are interested in contributing please
send a courtesy email to dev@rentpost.com

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

## License

This library is released under the MIT license.
