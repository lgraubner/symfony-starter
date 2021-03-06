# Symfony API Starter

## Common commands

```bash
# create database schema
docker-compose exec php bin/console doctrine:schema:create

# update database schema
docker-compose exec php bin/console doctrine:schema:update

# create controllers, tests etc.
docker-compose exec php bin/console make:controller

# clear dev cache
docker-compose exec php bin/console cache:clear -e dev

# Generate optimized autoloader for production
composer dump-autoload --no-dev --classmap-authoritative
```

## Packages

```
# annotations
composer require sensio/framework-extra-bundle

# doctrine
composer require orm

# doctrine migrations
composer require doctrine/doctrine-migrations-bundle

# cors
composer require cors

# php cs fixer
composer require --dev cs-fixer

# phpunit
composer require --dev symfony/phpunit-bridge

# validation
composer require symfony/validator

# serializer
composer require symfony/serializer-pack

# debug
composer require debug

# security
composer require security

# make command
composer require symfony/maker-bundle --dev

# mail
composer require symfony/mailer

# form handling
composer require symfony/form

# reset password
composer require symfonycasts/reset-password-bundle
```
