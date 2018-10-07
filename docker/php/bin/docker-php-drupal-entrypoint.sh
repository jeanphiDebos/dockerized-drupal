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

if [ ! -f ./vendor/bin/drupal ]; then
    echo -e "\e[33;1mInstall composer vendors\e[0m"
    composer install
fi

echo -e "\e[35mWaiting for database connection...\e[0m"
until nc -z -v -w30 mysql 3306
do
  sleep 1
done

set +e
drupal site:status 2>&1 > /dev/null
STATUS=$?
set -e
if [ $STATUS -ne 0 ]; then
    echo -e "\e[33;1mInstall drupal\e[0m"
    drupal si ${DRUPAL_PROFILE} \
      --no-interaction \
      --langcode=${DRUPAL_LANGCODE} \
      --db-type=mysql \
      --db-host=mysql \
      --db-port=3306 \
      --db-prefix=${DRUPAL_DB_PREFIX} \
      --db-name=${MYSQL_DATABASE} \
      --db-user=${MYSQL_USER} \
      --db-pass=${MYSQL_PASSWORD} \
      --site-name=${DRUPAL_SITE_NAME} \
      --site-mail=${DRUPAL_SITE_MAIL} \
      --account-name=${DRUPAL_USERNAME} \
      --account-mail=${DRUPAL_USERMAIL} \
      --account-pass=${DRUPAL_PASSWORD}
fi

/usr/local/bin/docker-php-entrypoint $@
