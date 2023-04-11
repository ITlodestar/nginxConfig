FROM ubuntu:latest

RUN apt install sqlite3 && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R u+w /var/www/html
RUN chown -R www-data:www-data /var/www/html/certificates && \
    chown -R www-data:www-data /var/www/html/nginx-configs 
RUN apk add php8-sqlite3
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite
COPY php.ini /usr/local/etc/php/conf.d/custom.ini