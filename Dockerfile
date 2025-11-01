# Stage 1: Build stage with Composer
FROM composer:2.7 AS build
WORKDIR /app

# Set environment variables to avoid artisan errors during build
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV SKIP_COMPOSER_SCRIPT=1

# Copy composer files first for caching
COPY composer.json composer.lock ./

# Install dependencies without running post scripts
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs --no-scripts

# Copy all application files
COPY . .

# Stage 2: PHP 8.3 + Apache
FROM php:8.3-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install required system libraries and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev libssl-dev curl \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo_mysql zip gd intl bcmath opcache

# Copy application from build stage
COPY --from=build /app /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
