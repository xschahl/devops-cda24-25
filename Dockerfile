FROM php:7.4-apache
RUN docker-php-ext-install -j$(nproc) mysqli
COPY app/ /var/www/html/