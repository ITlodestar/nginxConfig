FROM ubuntu:latest

RUN sudo apt install sqlite3 && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R u+w /var/www/html
RUN sudo chown www-data:www-data /var/www/nginxConfig/certificates -R && \
    sudo chown www-data:www-data /var/www/nginxConfig/nginx-configs -R 
