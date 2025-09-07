#!/bin/sh

# Configurer permissions
# chown -R www-data:www-data storage bootstrap/cache

# Lancer Nginx + PHP-FPM via Supervisor
# exec /usr/bin/supervisord -c /etc/supervisord.conf
set -e

# Lancer supervisord (qui gère php-fpm + nginx)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

