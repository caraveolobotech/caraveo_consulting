# ---- builder: composer & node to build app and assets ----
FROM php:8.2-fpm AS builder

# system packages needed for building php extensions + node build
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip zlib1g-dev libicu-dev pkg-config libzip-dev \
    nodejs npm gnupg2 ca-certificates default-mysql-client --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# install php extensions needed for building (pdo, mbstring, intl, gd...)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# ensure composer available
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# copy entire project early so composer scripts that call artisan won't fail
COPY . /app

# install php deps (no-dev for production)
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader || true

# build node assets (if you don't have node steps, these will be quick)
# protect with if package.json exists
RUN if [ -f package.json ]; then npm ci && npm run build; fi

# run any artisan one-offs (key gen, storage link) but ignore failure if not needed
RUN php artisan key:generate --force || true
RUN php artisan storage:link || true || true

# ---- runtime: nginx + php-fpm ----
FROM php:8.2-fpm AS runtime

# runtime deps
RUN apt-get update && apt-get install -y \
    nginx curl unzip libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev pkg-config \
  && rm -rf /var/lib/apt/lists/*

# install PHP extensions required at runtime
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Force php-fpm to listen on TCP 127.0.0.1:9000 (instead of default socket)
RUN sed -i "s@^listen = .*@listen = 127.0.0.1:9000@" /usr/local/etc/php-fpm.d/www.conf || true

# create non-root user
RUN useradd -G www-data,root -u 1000 -m caraveo

WORKDIR /var/www/html

# copy app from builder
COPY --from=builder /app /var/www/html

# permissions
RUN chown -R caraveo:www-data /var/www/html && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

# copy nginx template and start script
COPY nginx.conf.template /etc/nginx/nginx.conf.template
COPY start.sh /start.sh
RUN chmod +x /start.sh

# expose (Render provides $PORT at runtime; we prepare nginx to use that)
EXPOSE 8080

# default entrypoint
CMD ["/start.sh"]