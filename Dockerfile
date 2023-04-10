FROM ubuntu:latest

RUN apt-get update && apt-get install -y nginx
RUN sudo apt install --no-install-recommends php8.1
RUN sudo apt-get install php8.1-PACKAGE_NAME

COPY default /etc/nginx/sites-available/default
COPY nginxConfig /var/www/nginxConfig


EXPOSE 80

RUN sudo chown www-data:www-data /var/www/nginxConfig/certificates -R && \
    sudo chown www-data:www-data /var/www/nginxConfig/nginx-configs -R 
CMD ["nginx", "-g", "daemon off;"]