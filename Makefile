up:
	docker-compose up

down:
	docker-compose down

migrate:
	docker-compose exec php bin/console doctrine:migrations:migrate

schema-update:
	docker-compose exec php bin/console doctrine:schema:update --force

clear-cache:
	docker-compose exec php php bin/console cache:clear

cs:
	vendor/bin/php-cs-fixer fix --verbose

dump:
	docker-compose exec php bin/console server:dump

test:
	bin/phpunit
