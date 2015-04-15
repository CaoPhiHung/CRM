<?php
if (count($argv) < 2) {
    echo "You need to provide a path for nginx configuration";
    exit(0);
}

$root = $argv[1];

$config = <<<END
server {
    listen      81;
    server_name localhost;

    set \$root_path $root;
    root    \$root_path;
    autoindex on;

    index index.php app_dev.php index.html index.htm;

    add_header 'Access-Control-Allow-Origin' '*';
    add_header 'Access-Control-Allow-Credentials' 'true';
    add_header 'Access-Control-Allow-Headers' 'Content-Type,Accept';
    add_header 'Access-Control-Allow-Methods' 'GET, POST, OPTIONS, PUT, DELETE';

    client_max_body_size 300M;

    try_files \$uri \$uri/ @rewrite;

    location @rewrite {
        rewrite ^/(.*)$ /app_dev.php?_url=/$1;
    }

    location ~ \.php {

        fastcgi_index  /app_dev.php;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_read_timeout 3000;

        include fastcgi_params;
        fastcgi_split_path_info       ^(.+\.php)(/.+)$;
        fastcgi_param PATH_INFO       \$fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED \$document_root\$fastcgi_path_info;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }

    location ~* ^/(css|img|js|flv|swf|download)/(.+)$ {
        add_header Access-Control-Allow-Origin *;
        root \$root_path;
    }

    location ~ /\.ht {
        deny all;
    }
}
END;

file_put_contents(__DIR__ . '/release.conf', $config);
