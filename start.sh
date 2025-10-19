#!/usr/bin/env bash
set -e

# PORT que Render proporciona (si no existe, fallback a 8080)
PORT="${PORT:-8080}"

# Reemplazar placeholder en nginx.conf.template -> nginx.conf
sed "s/{{PORT}}/${PORT}/g" /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Arranca php-fpm en background (daemonize)
# -D es para daemonize; si la imagen soporta -F (foreground) se podría usar distinto,
# pero usar -D y dejar nginx en foreground está bien.
php-fpm -D

# Iniciar nginx en foreground (no daemonize)
nginx -g "daemon off;"
