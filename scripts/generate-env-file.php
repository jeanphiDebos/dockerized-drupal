#!/bin/php
<?php
const PARAMS = [
  'Environment configuration' => [
    'UID' => 1000,
    'GID' => 1000,
  ],
  'Apache configuration' => [
    'APACHE_PORT' => 18080,
    'APACHE_VERSION' => '2.4'
  ],
  'MySQL configuration' => [
    'MYSQL_DATABASE' => 'drupal',
    'MYSQL_USER' => 'drupal',
    'MYSQL_PASSWORD' => 'bHswbzhv8fmtWrBdnkvDQxWXKaMfcFm5',
    'MYSQL_ROOT_PASSWORD' => 'qpLZoz7zTbmdgAQw7awwEcXKZH9B5aQz',
    'MYSQL_VERSION' => '5.5.59',
  ],
  'PHP configuration' => [
    'PHP_VERSION' => '7.2-alpine-fpm',
  ],
  'Drupal configuration' => [
    'DRUPAL_DB_PREFIX' => '',
    'DRUPAL_LANGCODE' => 'en',
    'DRUPAL_PASSWORD' => 'admin',
    'DRUPAL_PROFILE' => 'standard',
    'DRUPAL_SITE_MAIL' => 'admin@example.com',
    'DRUPAL_SITE_NAME' => 'Drupal8',
    'DRUPAL_USERMAIL' => 'admin@example.com',
    'DRUPAL_USERNAME' => 'admin',
    'DRUPAL_VERSION' => '8.6.1',
  ],
];

$fp = fopen('.env', 'w');

foreach (PARAMS as $section => $params) {
  fwrite($fp, "# $section\n");

  foreach($params as $key => $param) {
    fwrite($fp, "$key=$param\n");
  }

  fwrite($fp, "\n");
}
