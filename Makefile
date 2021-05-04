.PHONY: install qa cs csf phpstan tests coverage-clover coverage-html

install:
	composer update

tests:
	vendor/bin/tester tests/Forms -s -p php
