#!/usr/bin/env bash
set -e

# PORT fallback
PORT="${PORT:-8080}"

# Reemplazar placeholder en nginx.conf.template
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Clear & cache config for new env vars
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache || true

# Start php-fpm in background
php-fpm -D

# Start nginx in foreground
nginx -g "daemon off;"