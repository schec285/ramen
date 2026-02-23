FROM php:8.4.12-fpm

# 必要ライブラリ
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# PHP拡張
RUN docker-php-ext-install pdo_mysql mbstring zip exif

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Xdebug設定
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]