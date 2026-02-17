#!/bin/sh
set -e

cd /var/www/html

# .env が無ければ作成
if [ ! -f .env ]; then
  cp .env.example .env
fi

# APP_KEY が未設定 or 空なら生成
APP_KEY_VALUE=$(grep '^APP_KEY=' .env | cut -d= -f2)

if [ -z "$APP_KEY_VALUE" ]; then
  php artisan key:generate
fi

php artisan migrate --force

exec "$@"
