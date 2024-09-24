FROM phpdockerio/php80-cli:latest
WORKDIR /app
EXPOSE 8765
RUN apt update && \
    apt install -y \
    php8.0-cli \
    php8.0-intl \
    php8.0-xmlwriter \
    php8.0-mbstring \
    php8.0-sqlite3 \
    php8.0-mysql \
    php8.0-curl \
    php-xdebug \
    mysql-client \
    git
RUN rm /etc/alternatives/php && ln -s /usr/bin/php8.0 /etc/alternatives/php
COPY  ./docker/php/xdebug/php-xdebug.ini  /etc/php/8.0/mods-available
COPY ./docker/php/start_server.sh /usr/local/bin/start_server.sh
RUN phpenmod php-xdebug
