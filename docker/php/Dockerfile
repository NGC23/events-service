FROM php:8.2-fpm-alpine

# Copy the php config file
COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

# Install extensions for php, such as pdo etc
RUN docker-php-ext-install pdo pdo_mysql

# Xdebug
RUN apk add --no-cache linux-headers \
	&& apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS\
	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug \
	&& pecl clear-cache \
	&& apk del .build-dependencies


# Copy the application code
COPY . /app

VOLUME ["/app"]