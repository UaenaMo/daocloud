FROM daocloud.io/php:5.6.3-apache
RUN apt-get update
RUN docker-php-ext-install pdo_mysql
COPY . /var/www/html/