FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

RUN apt-get update \
    && apt-get install -y nginx sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

RUN chown -R www-data:www-data /var/www

RUN chmod 777 /var/www/html/

RUN chown -R www-data:www-data /var/www/html/certificates && \
    chown -R www-data:www-data /var/www/html/nginx-configs
RUN apt-get install php-sqlite3

# COPY php.ini /usr/local/etc/php/conf.d/custom.ini



