#new laravel app

composer global require "laravel/installer"
laravel new laravelBlog

sudo chgrp -R www-data laravelBlog
sudo chmod -R 775 laravelBlog/storage


echo "
server {
  listen        80;
  listen        [::]:80;
  server_name   laravelBlog;

## redirect http to https ##
#  rewrite        ^ https://\$server_name\$request_uri? permanent;

  root         /tool/webserver/laravelBlog/public;
  index index.php index.html index.htm;

  access_log    /var/log/nginx/laravelBlog-access.log;
  error_log     /var/log/nginx/laravelBlog-error.log;

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
" | sudo tee /etc/nginx/sites-available/laravelBlog


sudo ln -sf /etc/nginx/sites-available/laravelBlog /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx.service

#check http://lrv_quoteapp

mysql -u root -p  -e "CREATE DATABASE laravelBlogDb CHARACTER SET utf8;"
mysql -u root -p -e "GRANT ALL PRIVILEGES ON laravelBlogDb.* TO 'oselit'@'localhost' IDENTIFIED BY 'secretpassword';"

edit lrv_quoteapp/.env
cd laravelBLogDb
php artisan migrate
sudo chgrp -R www-data .
