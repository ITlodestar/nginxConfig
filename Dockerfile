FROM ubuntu:latest

RUN apt install sqlite3 && \
    sudo chown -R www-data:www-data /var/www/html && \
    sudo chmod -R u+w /var/www/html
RUN sudo chown www-data:www-data /var/www/html/certificates -R && \
    sudo chown www-data:www-data /var/www/html/nginx-configs -R 
RUN apk add php8-sqlite3
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite
COPY php.ini /usr/local/etc/php/conf.d/custom.ini