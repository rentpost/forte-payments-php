#!/usr/bin/make -f

SHELL := /bin/bash


# Test that we have the necessary binaries available
define checkExecutables
	$(foreach exec,$(1),\
		$(if $(shell command -v $(exec)),,$(error Unable to find `$(exec)` in your PATH)))
endef


# Note that all comments with two hashes(#) will be used for output with `make help`. Alignment is tricky!
.PHONY: help
help:
	$(call checkExecutables, fgrep)
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

##
## Forte Payments (PHP) — Forte payment gateway PHP library make targets. Run `make help` to list targets.
##

##
## --- Setup ---------------------------------------------------------------
##

.PHONY: init
init:                      ## Initializes the project and all dependencies
	$(call checkExecutables, composer)
	@make install-vendors


##
## --- Dependencies --------------------------------------------------------
##

.PHONY: install-vendors
install-vendors:           ## Installs all the vendor lib dependencies.
	$(call checkExecutables, docker)
	@composer install


.PHONY: update-autoload
update-autoload:           ## Dump composer autoloader.
	$(call checkExecutables, docker)
	@composer dumpautoload


.PHONY: update-vendors
update-vendors:            ## Updates all the vendor lib dependencies.
	$(call checkExecutables, docker)
	@composer update


##
## --- Testing -------------------------------------------------------------
##

.PHONY: test
test:                      ## Runs all tests.
	$(call checkExecutables, docker)
	@vendor/bin/phpunit -d memory_limit=256M --configuration test/phpunit.xml


.PHONY: test-only
test-only:                 ## Only runs tests with 'test-only' group annotation
	$(call checkExecutables, docker)
	@vendor/bin/phpunit -d memory_limit=256M --configuration test/phpunit.xml --group test-only
