# ---- builder: composer & node to build app and assets ----
FROM php:8.2-fpm AS builder

# Dependencias para construir (composer + node)
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip zlib1g-dev libicu-dev libzip-dev \
    nodejs npm gnupg2 ca-certificates default-mysql-client --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Extensiones necesarias (build-time)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Composer (cliente)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiamos todo el proyecto (asegura que artisan existe antes de composer)
COPY . /app

# Permisos básicos durante build
RUN chown -R www-data:www-data /app

# Composer install (sin dev)
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader || true

# Generar key y link storage si no existe (seguros si ya existe)
RUN php artisan key:generate --force || true
RUN php artisan storage:link || true

# Node -> build assets (Vite)
# Asegúrate que package.json y scripts existan y "build" sea correcto
RUN npm ci && npm run build || true

# ---- runtime: nginx + php-fpm ----
FROM php:8.2-fpm AS runtime

# Dependencias de runtime (incluye icu para intl)
RUN apt-get update && apt-get install -y nginx curl unzip libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev procps --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Reinstalamos extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Forzar php-fpm a escuchar por TCP en 127.0.0.1:9000 (coincide con nginx config)
RUN sed -i "s@^listen = .*@listen = 127.0.0.1:9000@" /usr/local/etc/php-fpm.d/www.conf || true

# Crear usuario no-root
RUN useradd -G www-data,root -u 1000 -m caraveo

WORKDIR /var/www/html

# Copiar la app compilada desde builder
COPY --from=builder /app /var/www/html

# Set permisos
RUN chown -R caraveo:www-data /var/www/html && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Copiar nginx template y start
COPY nginx.conf.template /etc/nginx/nginx.conf.template
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Exponer puerto (Render inyecta $PORT al container; nginx será configurado con ese)
EXPOSE 8080

CMD ["/start.sh"]