# This Dockerfile is to build Docker image "deminy/swoole-by-examples:client".
# @see https://hub.docker.com/r/deminy/swoole-by-examples
FROM phpswoole/swoole:4.4.15-php7.3

RUN \
    pecl install redis-5.1.1 && \
    docker-php-ext-enable redis && \
    apt-get update && \
    apt-get install -y netcat xxd --no-install-recommends && \
    curl -sfL -o websocat.deb https://github.com/vi/websocat/releases/download/v1.5.0/websocat_1.5.0_ssl1.1_amd64.deb && \
    dpkg -i websocat.deb && \
    rm -rf websocat.deb /var/lib/apt/lists/* && \
    composer require -d ${HOME} -n predis/predis:~1.1.0
