## Prerequesites
* Composer
* PHP ~^7.3
* XAMPP Server

## Getting started

### Database Setup
* open PHP myadmin after running Xampp Server
* create database named as `tapmango`
* under that database, import file `tapmango.sql`. (You may find this file in project's root directory).

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

* Clone the repository

```git clone https://github.com/amanvr2/tapmango.git```

* Switch to the repo folder

```cd laravel-realworld-example-app```

* Install all the dependencies using composer

```composer install```

* Generate a new application key

```php artisan key:generate```


* Make sure you set the correct database connection information
* To start the app run following command in project root directory
```php artisan serve```


