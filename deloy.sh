#!/bin/bash
time=$(date +'%Y%m%d%H%M')
sed -i "s/LOAD_DATE=.*/LOAD_DATE=${time}/g" .env
composer install
composer dump-autoload
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan config:cache
