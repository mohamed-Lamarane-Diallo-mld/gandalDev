# Étape 1 : Construire l'image PHP
FROM php:8.2-fpm as php_fpm

# Installe les dépendances système requises par PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libsqlite3-dev \
    zip \
    curl \
    libonig-dev

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo_sqlite mbstring zip exif pcntl

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail
WORKDIR /var/www/html

# Copie les fichiers du projet
COPY . /var/www/html

# Exécute Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Nettoie les caches de l'application
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Définit les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose le port pour PHP-FPM
EXPOSE 9000

# Commande de démarrage par défaut pour PHP-FPM
CMD ["php-fpm"]


# Étape 2 : Configurer Nginx
FROM nginx:1.23-alpine as nginx

# Copie le fichier de configuration Nginx
COPY --from=php_fpm /var/www/html/docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose le port pour Nginx
EXPOSE 80

# Commande de démarrage par défaut pour Nginx
CMD ["nginx", "-g", "daemon off;"]