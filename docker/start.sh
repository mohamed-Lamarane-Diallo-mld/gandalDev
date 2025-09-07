#!/bin/sh

# Migration + cache Laravel
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Lancer Nginx + PHP-FPM via Supervisor
exec /usr/bin/supervisord -c /etc/supervisord.conf
