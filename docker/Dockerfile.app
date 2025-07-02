FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip zip git curl nano gnupg gnupg2 lsb-release \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    libonig-dev libxml2-dev libpq-dev libaio1 \
    libssl-dev libcurl4-openssl-dev unixodbc-dev \
    && apt-get clean

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_pgsql pgsql zip gd mbstring xml

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /var/www/html
