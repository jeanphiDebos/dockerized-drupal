#!/bin/sh
set -e

if [ ! -f ./vendor/bin/composer ]; then
    echo -e "\e[33;1mInstall composer\e[0m"
    mkdir -p ./vendor/bin
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    mv ./composer.phar ./vendor/bin/composer
    chmod +x ./vendor/bin/composer
fi

/usr/local/bin/docker-php-entrypoint $@
