## Install Vue JS into already installed Laravel application
# Source:
https://www.techiediaries.com/laravel/how-to-install-vuejs-in-laravel-6-7-by-example/

In this quick tutorial, we'll learn how to install and use the Vue.js library in your Laravel 6 or Laravel 7 project using the laravel/ui package.

#A Separate Laravel 7/6 Package for Vue.js Scaffolding
The laravel/ui is a separate package that provides the UI scaffoldings for bootstrap, vue and react. Alongside with the auth scaffold for login and registration.

Provided that you already have a Laravel project setup. Head over to your command-line interface and run the following command:

> composer require laravel/ui

#Adding Vue to your Laravel 7/6 Project
After successfully installing the laravel/ui package, we can now add vue to our application.

Head back to your terminal and run the following artisan command:

> php artisan ui vue
If you also need to add the auth scaffolding, add the --auth switch to the command:

> php artisan ui vue --auth

#Installing Vue.js Dependencies
Now, you also need to install the Vue.js dependencies from npm using the following command:

> npm install
You should have node and npm installed in your system for the previous command to work.
