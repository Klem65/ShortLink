FROM php:8.1.0-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN addgroup -g ${GID} --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

RUN apk update \
  && apk add curl git vim

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
 /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug date dom filter json pcre session tokenizer pdo pdo_mysql simplexml spl  \
    @composer ctype iconv

USER laravel

WORKDIR /var/www/html/

