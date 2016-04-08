FROM php:7.0.5-apache
RUN docker-php-ext-install pdo pdo_mysql