FROM php:7.4-cli
COPY . /usr/src/app-command
WORKDIR /usr/src/app-command
CMD ["php", "./bin/console"]