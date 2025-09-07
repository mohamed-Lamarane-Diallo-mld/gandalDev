# Utiliser une image de base PHP avec FPM
FROM php:8.2-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Définir répertoire de travail
WORKDIR /var/www/html

# Copier projet
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions Laravel

RUN chown -R www-data:www-data /var/www/html/public

# Modifier la configuration de PHP-FPM
RUN sed -i 's|listen = /var/run/php-fpm.sock|listen = 9000|' /usr/local/etc/php-fpm.d/www.conf

# Copier configuration nginx et supervisor
RUN rm -f /etc/nginx/conf.d/default.conf
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf



EXPOSE 80

# Démarrer supervisord
CMD ["supervisord", "-c", "/etc/supervisord.conf"]

