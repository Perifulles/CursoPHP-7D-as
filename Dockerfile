FROM php:8.3-apache

# Extensions for exercises + zip for project download
RUN apt-get update && apt-get install -y libzip-dev && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

WORKDIR /var/www/html
