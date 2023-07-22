FROM wordpress:cli-php8.1

USER root

RUN docker-php-ext-install pdo pdo_mysql

USER www-data

COPY install-wordpress /usr/local/bin/install-wordpress