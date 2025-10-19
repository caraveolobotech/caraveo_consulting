# ---- builder: composer & node to build app and assets ----
FROM php:8.2-fpm AS builder

# Instalar dependencias del sistema necesarias para ext y composer
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip zlib1g-dev libicu-dev libzip-dev \
    nodejs npm gnupg2 ca-certificates default-mysql-client --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Instalar extensiones php
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Composer (tomado de la imagen oficial de composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar composer files e instalar dependencias PHP (sin dev)
COPY composer.json composer.lock /app/
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Copiar package files e instalar node deps y compilar assets
COPY package.json package-lock.json /app/
RUN npm ci && npm run build

# Copiar el resto del proyecto
COPY . /app

# Ejecutar scripts post-copy (si necesitas generar key)
RUN php artisan key:generate --force || true
RUN php artisan storage:link || true

# ---- runtime: nginx + php-fpm ----
FROM php:8.2-fpm AS runtime

# Instalar dependencias de runtime mínimas (nginx, utilidades)
RUN apt-get update && apt-get install -y nginx curl unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
  && rm -rf /var/lib/apt/lists/*

# Reconfigurar php-fpm para escuchar por TCP 127.0.0.1:9000 en vez de socket
# Esto hace que nginx pueda conectar vía fastcgi a php-fpm en 127.0.0.1:9000
RUN sed -i "s@^listen = .*@listen = 127.0.0.1:9000@" /usr/local/etc/php-fpm.d/www.conf || true

# (Re)instalamos extensiones mínimas por si faltaran en runtime
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl || true

# Crear usuario para ejecutar la aplicación (no root)
RUN useradd -G www-data,root -u 1000 -m caraveo

WORKDIR /var/www/html

# Copiar app desde builder
COPY --from=builder /app /var/www/html

# Ajustar permisos básicos
RUN chown -R caraveo:www-data /var/www/html \
  && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Copiar configuración de nginx y entrypoint
COPY nginx.conf.template /etc/nginx/nginx.conf.template
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Exponer el puerto (Render define $PORT, el contenedor debe escuchar en ese puerto)
EXPOSE 8080

# Entrypoint — start.sh reemplaza {{PORT}} por $PORT y arranca php-fpm + nginx
CMD ["/start.sh"]
