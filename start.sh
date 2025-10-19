#!/usr/bin/env bash
set -e

PORT="${PORT:-8080}"

# Reemplaza placeholder {{PORT}} en la plantilla nginx (asegúrate que nginx.conf.template tenga {{PORT}})
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Iniciar php-fpm en background
php-fpm -D

# Iniciar nginx en primer plano
nginx -g "daemon off;"