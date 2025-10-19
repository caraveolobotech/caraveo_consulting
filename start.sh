#!/usr/bin/env bash
set -e

PORT="${PORT:-8080}"

# Replace placeholder port into nginx.conf.template
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Ensure storage directories and permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Start php-fpm (background)
php-fpm -D

# Start nginx in foreground
nginx -g "daemon off;"