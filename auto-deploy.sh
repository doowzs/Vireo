#!/bin/sh
git pull
composer install --no-interaction --no-dev --prefer-dist
php artisan migrate --force
php artisan vireo:cache