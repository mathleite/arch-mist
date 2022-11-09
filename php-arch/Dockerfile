FROM php:8.1-fpm-buster

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Install MongoDB exetension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Get latest Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer