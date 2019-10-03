# Install Laravel right after Composer is installed and ready
#download as superuser
#download installer
sudo composer global require "laravel/installer=~1.1"

# setting up path
# Open .bashrc and Edit it
sudo vi ~/.bashrc
# Add the following line to at the end of it:
export PATH="$PATH:~/.composer/vendor/bin"
# Or this line
export PATH="~/.composer/vendor/bin:$PATH"

# Now restart .bashrc
source ~/.bashrc

# Now type Laravel to see if it executes on the command line
laravel

# Old way---------------------------------------------------------------------------
# Source:
# https://www.tecmint.com/install-laravel-php-framework-on-ubuntu/
cd /var/www/html

cd ..
sudo chmod 777 html/
cd html

git clone https://github.com/laravel/laravel.git

cd laravel/
sudo composer install
