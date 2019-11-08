FROM php:7.3-apache

COPY ./www/ /var/www/html

EXPOSE 80