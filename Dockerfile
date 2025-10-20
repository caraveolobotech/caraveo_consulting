FROM php:8.2-cli
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev zip \
    && docker-php-ext-install pdo mbstring zip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan view:clear
RUN mkdir -p storage bootstrap/cache database \
    && chmod -R 777 storage bootstrap/cache database
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]