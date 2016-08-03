FROM daocloud.io/php:7.0.0RC4-apache
RUN apt-get update
RUN docker-php-ext-install pdo_mysql
COPY . /var/www/html/