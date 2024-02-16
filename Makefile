vendors:
	docker/exec composer install -n -v --profile

tests: lint analyse phpunit

lint:
	mkdir -p ./.cache
	docker/exec vendor/bin/phpcs -p

fixer:
	docker/exec vendor/bin/phpcbf -p

analyse:
	mkdir -p ./.cache/phpstan
	docker/exec vendor/bin/phpstan analyse --memory-limit=4G

phpunit:
	docker/exec vendor/bin/phpunit
