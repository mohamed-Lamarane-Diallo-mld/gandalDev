#!/bin/sh

# Configurer permissions
chown -R www-data:www-data storage bootstrap/cache

# Lancer Nginx + PHP-FPM via Supervisor
exec /usr/bin/supervisord -c /etc/supervisord.conf
