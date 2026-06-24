FROM php:8.3-fpm-alpine

# Install dependencies (linux-headers added here)
RUN apk add --no-cache curl sqlite sqlite-dev git unzip libzip-dev linux-headers \
    && docker-php-ext-install pdo pdo_sqlite zip sockets

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Create Laravel Project
RUN composer create-project laravel/laravel . --prefer-dist --no-interaction

# Copy our custom source files
COPY ./src /tmp/src

# Apply custom files and set permissions
RUN cp -a /tmp/src/. /var/www/html/ \
    && touch database/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
