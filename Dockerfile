# ---- builder: composer & node to install deps (no scripts/build) ----
FROM php:8.2-fpm AS builder

ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip zlib1g-dev libicu-dev libzip-dev \
    nodejs npm gnupg2 ca-certificates default-mysql-client --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Instalar extensiones php necesarias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Composer (copiar desde la imagen oficial de composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiamos sólo los archivos de metadata para instalar dependencias
COPY composer.json composer.lock package.json package-lock.json /app/

# Instalar dependencias PHP sin ejecutar scripts que requieran artisan
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Instalar dependencias de node (sin compilar todavía)
RUN npm ci --no-audit --no-fund

# ---- copiar el resto del proyecto ----
COPY . /app

# Ahora que todo el código está presente, ejecutar build de assets y comandos artisan que requieran archivos del repo
RUN npm run build || true

# Generar key, enlaces y discovery (si falla, no rompe el build)
RUN php artisan key:generate --force || true
RUN php artisan storage:link || true
RUN php artisan package:discover --ansi || true

# ---- runtime: nginx + php-fpm ----
FROM php:8.2-fpm AS runtime

ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias runtime mínimas (nginx + utilidades)
RUN apt-get update && apt-get install -y nginx curl unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
  && rm -rf /var/lib/apt/lists/*

# Reinstalar extensiones en runtime (ligero)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Forzar que php-fpm escuche en TCP 127.0.0.1:9000 (coincide con nginx.conf.template)
RUN sed -i "s@^listen = .*@listen = 127.0.0.1:9000@" /usr/local/etc/php-fpm.d/www.conf || true

# Crear usuario no-root (opcional, para permisos)
RUN useradd -G www-data,root -u 1000 -m caraveo

WORKDIR /var/www/html

# Copiar app desde builder
COPY --from=builder /app /var/www/html

# Ajustar permisos básicos
RUN chown -R caraveo:www-data /var/www/html && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Copiar configuración de nginx y script de arranque
COPY nginx.conf.template /etc/nginx/nginx.conf.template
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Exponer puerto (interno; Render inyecta $PORT)
EXPOSE 8080

# Start (reemplaza puerto y arranca nginx + php-fpm)
CMD ["/start.sh"]