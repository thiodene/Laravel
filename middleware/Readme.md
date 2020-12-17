# As a developer, I need additional middleware to check roles/permissions for the laravel-auth package

The only middleware that exists is checking

the user session exists

the user has access to the microservice

This is good for general purpose, however we should also add:

Checking the profile (super admin, admin, editor, etc)

Checking the permissions

## Checking Role from Middleware

For Middleware, Laravel-auth, I will focus on the following parts:

vendor > dcpp > laravel-auth > src > Http > Middleware > AuthenticateAccounts.php

vendor > dcpp > laravel-auth > src > Http > Controllers > SecurityController.php

Created the following and working on it:

vendor > dcpp > laravel-auth > src > Http > Middleware > CheckRole.php


## Checking Permission from Middleware

For Middleware, Laravel-auth, I will focus on the following parts:

vendor > dcpp > laravel-auth > src > Http > Middleware > AuthenticateAccounts.php

vendor > dcpp > laravel-auth > src > Http > Controllers > SecurityController.php

Created the following and working on it:

vendor > dcpp > laravel-auth > src > Http > Middleware > CheckPermission.php
