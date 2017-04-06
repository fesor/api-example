include ${HTTP_TO_HTTPS_REDIRECT};

server {
    listen ${NGINX_LISTEN_PORT};

    root /srv;

    include ${SSL_CONFIG};

    client_max_body_size 20M;

    include directives/gzip.conf;

    include locations/api_doc.conf;
    include locations/image_cache.conf;
    include locations/protect-system-files.conf;
    include locations/php_api.conf;
    include locations/spa.conf;
}
