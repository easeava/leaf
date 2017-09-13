## About Leaf Console

Basic Console

Installation
------------

> This package requires PHP 7+ and Laravel 5.5

First, install laravel 5.5, and make sure that the database connection settings are correct.

```
composer require gayly/leaf
```

Then run these commands to publish assets and config：

```
php artisan vendor:publish --provider="Gayly\Leaf\LeafServiceProvider"
```
After run command you can find config file in `config/admin.php`, in this file you can change the install directory,db connection or table names.

At last run following command to finish install.
```
php artisan leaf:install
```

Open `http://localhost/admin/` in browser,use username `admin` and password `admin` to login.
