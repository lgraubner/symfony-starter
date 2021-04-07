# Symfony Starter

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
