# FROM php:8.2-fpm-alpine

# # Installer dépendances système
# RUN apk add --no-cache \
#     nginx \
#     git \
#     unzip \
#     libzip-dev \
#     oniguruma-dev \
#     sqlite-dev \
#     curl \
#     bash \
#     supervisor

# # Installer extensions PHP
# RUN docker-php-ext-install pdo_sqlite mbstring zip exif pcntl

# # Installer Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# WORKDIR /var/www/html

# # Copier projet Laravel
# COPY . .

# # Installer dépendances PHP
# RUN composer install --no-dev --optimize-autoloader --no-interaction

# # Permissions Laravel
# RUN chown -R www-data:www-data storage bootstrap/cache

# # Copier config Nginx et Supervisord
# COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
# COPY ./docker/supervisord.conf /etc/supervisord.conf

# # Script de démarrage
# COPY ./docker/start.sh /usr/local/bin/start.sh
# RUN chmod +x /usr/local/bin/start.sh

# RUN chown -R www-data:www-data /var/www/html/public


# EXPOSE ${PORT}

# CMD ["start.sh"]

FROM php:8.2-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \
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
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/public


# Copier configuration nginx et supervisor
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
