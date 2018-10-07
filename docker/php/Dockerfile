ARG PHP_VERSION=latest
FROM drupaldocker/php:${PHP_VERSION}
MAINTAINER Mathieu Wambre <mathieu@wambre.fr>

RUN \
  apk update &&\
  apk add git &&\
  rm -Rf /var/cache/apk/* /var/lib/apk/* /etc/apk/cache/* &&\
  git --version
