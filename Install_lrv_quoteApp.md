#new laravel app
cd /php

composer global require "laravel/installer"

laravel new lrv_quoteApp

sudo chgrp -R www-data lrv_quoteApp
sudo chmod -R 775 lrv_quoteApp/storage


echo "
server {
  listen        80;
#  listen        [::]:80 ipv6only=on;
  server_name   lrv_quoteapp;

## redirect http to https ##
#  rewrite        ^ https://\$server_name\$request_uri? permanent;

  root         /php/lrv_quoteApp/public;
  index index.php index.html index.htm;

  access_log    /var/log/nginx/lrv_quoteapp-access.log;
  error_log     /var/log/nginx/lrv_quoteapp-error.log;

  location / {
    try_files \$uri \$uri/ /index.php?\$query_string;
  }
    location ~ \.php$ {
        try_files \$uri /index.php =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

}
" | sudo tee /etc/nginx/sites-available/lrv_quoteapp


sudo ln -sf /etc/nginx/sites-available/lrv_quoteapp /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx.service

#check http://lrv_quoteapp

mysql -u root -p
  CREATE DATABASE quoteappDB CHARACTER SET utf8;
  GRANT ALL PRIVILEGES ON quoteappDB.* TO 'oselit'@'localhost' IDENTIFIED BY 'secretpassword';

nano lrv_quoteapp/.env
