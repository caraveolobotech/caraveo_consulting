#!/usr/bin/env bash
set -e

# PORT que Render proporciona (si no existe, fallback a 8080)
PORT="${PORT:-8080}"

# Reemplazar placeholder en nginx.conf.template
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Iniciar php-fpm
# algunas imágenes usan /run/php/php8.2-fpm.sock; intentamos con php-fpm
php-fpm -D

# Start nginx in foreground (no daemonize)
nginx -g "daemon off;"
