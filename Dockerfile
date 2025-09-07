FROM php:8.2-fpm-alpine

# Installer dépendances système
RUN apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    sqlite-dev \
    curl \
    bash \
    supervisor

# Installer extensions PHP
RUN docker-php-ext-install pdo_sqlite mbstring zip exif pcntl

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier projet Laravel
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Copier config Nginx et Supervisord
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Script de démarrage
COPY ./docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["start.sh"]
