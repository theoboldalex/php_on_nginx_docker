FROM sykescottages/php:8.2-fpm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install

EXPOSE 9000
