server {
    charset utf-8;
    client_max_body_size 10M;

    listen 80; ## listen for ipv4
    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

    server_name api.mahr.adcviet.com;
    root /app/www/mahr.adcviet.com/api/web ;

    #root        /var/www/rest/rest/web;
    index       index.php;

    #access_log  /var/www/log/rest-access.log main;
    #error_log   /var/www/log/rest-error.log;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php?$args;
    }

    # uncomment to avoid processing of calls to non-existing static files by Yii
    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        try_files $uri =404;
    }
    #error_page 404 /404.html;

    location ~ \.php {
        fastcgi_split_path_info  ^(.+\.php)(.*)$;
        fastcgi_index   index.php;
        fastcgi_pass    unix:/var/lib/php/php.tcs.sock;
        include         fastcgi_params;
        fastcgi_param   SCRIPT_FILENAME    $document_root$fastcgi_script_name;
        fastcgi_param   SCRIPT_NAME        $fastcgi_script_name;
    }

    location ~ /\.(ht|svn|git) {
        deny all;
    }
}