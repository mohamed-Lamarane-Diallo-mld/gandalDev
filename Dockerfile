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

# Copier le projet Laravel entier
COPY . .

# Copier le fichier de configuration Apache personnalisé
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions pour Laravel (storage et cache + public)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Exposer le port que Render utilisera
ENV PORT=10000
EXPOSE 10000

# Configurer Apache pour écouter le port Render et définir DocumentRoot sur /public
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf \
    && sed -i "s|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g" /etc/apache2/sites-available/000-default.conf \
    && sed -i "s|<Directory /var/www/html>|<Directory /var/www/html/public>|g" /etc/apache2/sites-available/000-default.conf \
    && a2ensite 000-default.conf \
    && a2enmod rewrite

# Apache démarre automatiquement à l’exécution de l’image
CMD ["apache2-foreground"]
