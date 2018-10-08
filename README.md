# Composer create-project command for Drupal project with Docker environment.

This project provides a starter kit for managing your Drupal installation &
development using [Composer](https://getcomposer.org/) & [Docker](https://www.docker.com/).

## Usage

Fist you need to [install composer](https://getcomposer.org/download/), [docker](https://docs.docker.com/install/)
and [docker-compose](https://docs.docker.com/compose/install/).

> Note: The instructions below refer to the [global composer installation](https://getcomposer.org/doc/00-intro.md#globally).
You might need to replace `composer` with `php composer.phar` (or similar)
for your setup.

Next you can execute the composer create-project command :

```
composer create-project neimheadh/dockerized-drupal my_project
```

> Node: If you want to install a specific version of drupal, you can use the command
`composer create-project neimheadh/dockerized-drupal:{VERSION}`. Check the [release](releases/)
to know what versions are available.

You can now start your Drupal using the following command :

```
docker-compose up -d
```

> Node: See the [Docker Compose Documentation](https://docs.docker.com/compose/)
to have more information about how to use docker-compose.

Your Drupal instance is now accessible on http://localhost:8080.

## Configuration

The create-project command create a .env file in your project directory you can
change to personalize your installation.

> Node: You must change your .env file **before** you execute the `docker-compose up`
command, as it contains variables used during the Drupal installation.

Here the list of .env variables:

### Environment configuration

* **UID** *(default: your UID)*: User id.
* **GID** *(default: your GID)*: Group id.

### Apache configuration

* **APACHE_PORT** *(default: 8080)*: Apache port, used for your [http://localhost:{APACHE_PORT}](http://localhost:8080) url.
* **APACHE_VERSION** *(default: 2.4)*: Apache version of the Docker container.

### MySQL configuration

* **MYSQL_DATABASE** *(default: drupal)*: Database name.
* **MYSQL_USER** *(default: drupal)*: Database user.
* **MYSQL_PASSWORD** *(default: bHswbzhv8fmtWrBdnkvDQxWXKaMfcFm5)*: Database password.
* **MYSQL_ROOT_PASSWORD** *(default: qpLZoz7zTbmdgAQw7awwEcXKZH9B5aQz)*: Database root password.
* **MYSQL_VERSION** *(default: 5.5.59)*: MySQL version of the Docker container.

### PHP configuration

* **PHP_VERSION** *(default: 7.2-alpine-fpm)*: PHP Version for the Docker container. **You have to use a -fpm PHP version**.

### Drupal configuration

* **DRUPAL_DB_PREFIX** *(default: )*: Drupal database tables prefix.
* **DRUPAL_LANGCODE** *(default: your system language)*: Drupal default language.
* **DRUPAL_PASSWORD** *(default: admin)*: Drupal administrator password.
* **DRUPAL_PROFILE** *(default: standard)*: Drupal used profile.
* **DRUPAL_SITE_MAIL** *(default: admin@example.com)*: Drupal site e-mail.
* **DRUPAL_SITE_NAME** *(default: Drupal8)*: Drupal site name.
* **DRUPAL_USERMAIL** *(default: admin@example.com)*: Drupal administrator e-mail.
* **DRUPAL_USERNAME** *(default: admin)*: Drupal administrator username.
