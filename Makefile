.PHONY: install tests

install:
	composer update

tests:
	vendor/bin/tester -s -p php --colors 1 -C tests/Forms
