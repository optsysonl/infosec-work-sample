FROM mysql:8.0
EXPOSE 3306
COPY ./docker/mysql/docker-entrypoint-initdb.d/* /docker-entrypoint-initdb.d/
ENV MYSQL_ROOT_PASSWORD=root MYSQL_DATABASE=training MYSQL_USER=training MYSQL_PASSWORD=training
