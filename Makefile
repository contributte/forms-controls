.PHONY: install tests

install:
	composer update

tests:
	bash tests/run-tests.sh php tests/Forms
