# Install Composer on Ubuntu
# Source: https://getcomposer.org/download/

sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

sudo php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php

sudo php composer-setup.php --filename=composer

sudo mv composer /usr/local/bin/composer

composer
