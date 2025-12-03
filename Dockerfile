FROM php:8.2-apache

# enable apache mod_rewrite
RUN a2enmod rewrite

# copy semua file ke server apache
COPY . /var/www/html/

EXPOSE 80
