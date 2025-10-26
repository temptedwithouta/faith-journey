FROM php:8.4-cli-alpine

RUN apk add --no-cache git curl postgresql-dev unzip nodejs npm icu-dev libzip-dev zlib-dev && docker-php-ext-install pdo pdo_pgsql intl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app