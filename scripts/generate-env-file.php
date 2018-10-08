#!/bin/php
<?php
echo getenv('UID');
$configuration = [
  'Environment configuration' => [
    'UID' => getmyuid(),
    'GID' => getmygid(),
  ],
  'Apache configuration' => [
    'APACHE_PORT' => 8080,
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
    'DRUPAL_LANGCODE' => substr(getenv('LANG'), 0, 2),
    'DRUPAL_PASSWORD' => 'admin',
    'DRUPAL_PROFILE' => 'standard',
    'DRUPAL_SITE_MAIL' => 'admin@example.com',
    'DRUPAL_SITE_NAME' => 'Drupal8',
    'DRUPAL_USERMAIL' => 'admin@example.com',
    'DRUPAL_USERNAME' => 'admin',
  ],
];

$fp = fopen('.env', 'w');

foreach ($configuration as $section => $params) {
  fwrite($fp, "# $section\n");

  foreach($params as $key => $param) {
    fwrite($fp, "$key=$param\n");
  }

  fwrite($fp, "\n");
}
