FROM php:8.5-apache

# Instalace systémových závislostí
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libpng-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalace PHP rozšíření (bez MySQL - statické stránky)
RUN docker-php-ext-install zip intl gd

# Instalace Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Povolení mod_rewrite pro Apache (Nette routing)
RUN a2enmod rewrite

# Nastavení DocumentRoot na /var/www/html/www (Nette struktura)
ENV APACHE_DOCUMENT_ROOT /var/www/html/www
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Povolení .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Nastavení PHP (timezone, limity)
RUN echo "date.timezone = Europe/Prague" > /usr/local/etc/php/conf.d/timezone.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/timezone.ini

# Pracovní adresář
WORKDIR /var/www/html

# Oprávnění pro temp a log složky
RUN mkdir -p /var/www/html/temp /var/www/html/log \
    && chown -R www-data:www-data /var/www/html
