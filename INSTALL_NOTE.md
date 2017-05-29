# https://www.howtoforge.com/tutorial/install-laravel-on-ubuntu-for-nginx/

sudo apt install nginx

sudo apt install php7.0-fpm php7.0-cli php7.0-mcrypt  php-mbstring php-xml
php --ini
php -m


mkdir -p /php/laravel

echo "
server {
  listen        80; # default_server;
  listen [::]:80 ipv6only=on; #default_server ipv6only=on;
  server_name   laravel;

## redirect http to https ##
#  rewrite        ^ https://$server_name$request_uri? permanent;

  root         /php/laravel/public;
  index index.php index.html index.htm;

  access_log    /var/log/nginx/laravel-access.log;
  error_log     /var/log/nginx/laravel-error.log;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }
    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

}
" | sudo tee /etc/nginx/sites-available/laravel


sudo ln -sf /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/
sudo nginx -t

sudo nano /etc/php/7.0/fpm/php.ini
# https://serverfault.com/questions/189940/how-do-you-restart-php-fpm
sudo systemctl restart php7.0-fpm.service
sudo systemctl restart nginx.service

# First, we can create an empty 1GB file by typing:

# sudo fallocate -l 1G /swapfile
# We can format it as swap space by typing:
# sudo mkswap /swapfile
# Finally, we can enable this space so that the kernel begins to use it by typing:
# sudo swapon /swapfile
# Download Composer. Make sure you are in your home directory first.
cd ~
curl -sS https://getcomposer.org/installer | php
# All settings correct for using Composer
# Downloading...

# Composer (version 1.4.2) successfully installed to: /home/[user]/composer.phar
# Use it: php composer.phar

sudo mv composer.phar /usr/local/bin/composer
# Installing Laravel
# Now that we have installed composer, we need to install Laravel. Install it by the following command.
# composer create-project laravel/laravel /var/www/html/laravel --prefer-dist

composer create-project laravel/laravel /php/laravel --prefer-dist

sudo chgrp -R www-data /php/laravel
sudo chmod -R 775 /php/laravel/storage

<!-- https://github.com/FriendsOfPHP/PHP-CS-Fixer  -->
composer global require friendsofphp/php-cs-fixer

add .bashrc_custom
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
