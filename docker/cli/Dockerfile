FROM wordpress:cli-php8.3

USER root

RUN docker-php-ext-install pdo pdo_mysql

USER www-data

COPY install-wordpress /usr/local/bin/install-wordpress