FROM ubuntu:latest

RUN apt install sqlite3 && \
    sudo chown -R www-data:www-data /var/www/html && \
    sudo chmod -R u+w /var/www/html
RUN sudo chown www-data:www-data /var/www/nginxConfig/certificates -R && \
    sudo chown www-data:www-data /var/www/nginxConfig/nginx-configs -R 
CMD sqlite3 --version