FROM ubuntu:latest

RUN sudo apt install sqlite3
RUN sudo chown www-data:www-data /var/www/nginxConfig/certificates -R && \
    sudo chown www-data:www-data /var/www/nginxConfig/nginx-configs -R 
