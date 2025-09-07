# Utilise une image de base qui contient PHP et Composer
FROM php:8.2-fpm-alpine

# Installe les dépendances système nécessaires
RUN apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libsqlite3-dev \
    zip \
    curl

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo_sqlite mbstring zip exif pcntl

# Installe le gestionnaire de paquets Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail
WORKDIR /var/www/html

# Copie tous les fichiers du projet dans le conteneur
COPY . /var/www/html

# Exécute Composer pour installer les dépendances du projet
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Exécute les migrations de base de données
RUN php artisan migrate --force

# Nettoie les caches de l'application
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Définit les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Crée un lien symbolique pour le dossier public de Laravel
RUN ln -s /var/www/html/public /var/www/html/nginx

# Configure Nginx pour servir l'application Laravel
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copie le script d'entrée
COPY ./docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expose le port 80
EXPOSE 80

# Commande par défaut pour démarrer le service
CMD ["start.sh"]