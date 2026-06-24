#!/bin/sh
# Generate standard .env for SQLite
cat <<EOF > .env
APP_NAME="IP-Bro"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://localhost:8088
DB_CONNECTION=sqlite
CACHE_STORE=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
EOF

php artisan key:generate --force
php artisan migrate --force
php artisan optimize:clear

# Start PHP-FPM
exec php-fpm