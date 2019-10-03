# Source:
# https://www.tecmint.com/install-laravel-php-framework-on-ubuntu/
cd /var/www/html

cd ..
sudo chmod 777 html/
cd html

git clone https://github.com/laravel/laravel.git

cd laravel/
sudo composer install
