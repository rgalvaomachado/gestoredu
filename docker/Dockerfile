FROM php:8.2-apache

# Instalar dependências, o driver pdo_mysql E AS DEPENDÊNCIAS GD
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install pdo_mysql

# Configurar e instalar a extensão GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Habilitar reescritas no Apache
RUN a2enmod rewrite

# Instalar o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer