migrate:
	docker-compose exec php bin/console doctrine:migrations:migrate

schema-update:
	docker-compose exec php bin/console doctrine:schema:update

clear-cache:
	docker-compose exec php php bin/console cache:clear

cs:
	vendor/bin/php-cs-fixer fix --verbose

test:
	bin/phpunit
