#!/bin/bash
# Defines when MySql is ready to accept commands from the main app

# Kills shell if any command fails to execute
set -e

until mysql -uroot -proot -h trg-db --protocol=tcp -e ";" ; do
    >&2 echo "Mysql unavailable - sleeping"
    sleep 1
done

/app/bin/cake server --ini_path=php.ini --host=0.0.0.0 -v
