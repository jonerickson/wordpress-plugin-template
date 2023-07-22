FROM mcr.microsoft.com/devcontainers/php:8.1-apache-bullseye

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp
