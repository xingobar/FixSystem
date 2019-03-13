FROM php:7.1.7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql mbstring \
    && docker-php-ext-install sockets

RUN apt-get update \
 && apt-get install -yq  wget curl libzip-dev zip unzip 

RUN docker-php-ext-configure zip --with-libzip \
   && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer