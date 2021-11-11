FROM php:7.3-apache

RUN apt-get update && \
    docker-php-ext-install pdo_mysql mysqli mbstring

RUN a2enmod ssl
ADD ./ssl.conf /etc/apache2/sites-available/ssl.conf
ADD ./ssl/ssl.crt /etc/ssl/certs
ADD ./ssl/ssl.key /etc/ssl/private
RUN a2ensite ssl

WORKDIR /var/www/html
ADD ./src /var/www/html
