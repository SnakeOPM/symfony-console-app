FROM php:8.1.0-fpm

RUN apt-get -y update; apt-get -y install curl; apt-get -y install git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /app

COPY . .

CMD bash -c "composer install" && php console.php count
