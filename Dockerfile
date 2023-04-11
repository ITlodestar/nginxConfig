FROM php:8.0-fpm

RUN apt-get update \
    && apt-get install -y nginx sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html

RUN chmod 777 /var/www/html/

RUN chown -R www-data:www-data /var/www/html/certificates && \
    chown -R www-data:www-data /var/www/html/nginx-configs 
RUN apk add php8-sqlite3
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite
COPY php.ini /usr/local/etc/php/conf.d/custom.ini



