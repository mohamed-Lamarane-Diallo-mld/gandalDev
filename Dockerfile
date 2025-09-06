# Utilise une image de base qui contient PHP et Composer
FROM php:8.2-fpm

# Installe les dépendances système requises par PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    curl \
    libsqlite3-dev

# Installe les extensions PHP nécessaires (uniquement celles pour SQLite, plus d'autres extensions communes)
RUN docker-php-ext-install pdo_sqlite mbstring zip exif pcntl

# Installe le gestionnaire de paquets Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail
WORKDIR /var/www

# Copie tous les fichiers du projet dans le conteneur
COPY . /var/www

# Exécute Composer pour installer les dépendances du projet
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Nettoie les caches de l'application
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose le port 9000 pour le service PHP-FPM
EXPOSE 9000

# Commande par défaut pour démarrer le service PHP-FPM
CMD ["php-fpm"]