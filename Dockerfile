# Utiliser PHP 8.2 avec Apache intégré
FROM php:8.2-apache

# Installer dépendances système et PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le projet Laravel
COPY . .

# Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions pour Laravel (storage et cache)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port que Render utilisera
ENV PORT=10000
EXPOSE 10000

# Rediriger Apache pour écouter le port Render
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Apache démarre automatiquement à l’exécution de l’image
CMD ["apache2-foreground"]
