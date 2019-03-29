#!/bin/sh

unset GIT_DIR

echo "[AUTO] Start auto deployment."
cd /PATH_TO_PROJECT/
sudo -u WEB_USER_NAME /PATH_TO_GIT/git pull

echo "[AUTO] Pull from remote repo succeed!"
sudo -u WEB_USER_NAME /PATH_TO_PHP/php artisan vireo:cache

echo "[AUTO] Auto deployment succeed!"