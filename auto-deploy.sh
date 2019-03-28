#!/bin/sh

echo "[AUTO] Start auto deployment."
git pull

echo "[AUTO] Pull from remote repo succeed!"
php artisan migrate --force
php artisan vireo:cache

echo "[AUTO] Auto deployment succeed!"