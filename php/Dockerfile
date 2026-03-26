FROM php:8.4.12-fpm

# 必要ライブラリ
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev

# PHP拡張
RUN docker-php-ext-install pdo_mysql mbstring zip exif bcmath

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 開発環境用ビルド引数
ARG DEV_MODE=no

# Xdebug.ini を harmless にコピー
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# DEV_MODE=yes の場合のみ Xdebug 本体をインストール
RUN if [ "$DEV_MODE" = "yes" ]; then \
        pecl install xdebug && \
        docker-php-ext-enable xdebug; \
    fi

CMD ["php-fpm"]