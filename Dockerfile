FROM php:7.4-fpm-alpine3.14
COPY . /app
WORKDIR /app
CMD ["php", "./bin/console"]