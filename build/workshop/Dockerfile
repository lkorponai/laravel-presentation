FROM php:7.0-apache

RUN apt-get update \
    && apt-get install -y \
        libpq-dev

RUN docker-php-ext-install pdo_pgsql

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY php.ini /usr/local/etc/php/

#configuring apache
RUN a2enmod rewrite