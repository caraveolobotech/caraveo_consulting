#!/usr/bin/env bash
set -e

# PORT que Render proporciona (si no existe, fallback a 8080)
PORT="${PORT:-8080}"

# Reemplaza el placeholder {{PORT}} en nginx.conf.template por $PORT
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Asegurar que el usuario/carpetas tengan permisos
chown -R www-data:www-data /var/www/html || true
chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Iniciar php-fpm (en background)
php-fpm -D

# Iniciar nginx en primer plano (por Render)
nginx -g "daemon off;"