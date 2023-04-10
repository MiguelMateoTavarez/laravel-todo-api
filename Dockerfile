FROM sail-8.2/app

ENV WWWUSER=${WWWUSER} \
    LARAVEL_SAIL=1 \
    XDEBUG_MODE=${SAIL_XDEBUG_MODE:-off} \
    XDEBUG_CONFIG=${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}

COPY . /var/www/html