<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About E-Commerce

This is a basic PHP project using the Laravel framework focused on e-commerce. It includes product pages, ordering, payment processing, and a CMS for managing purchases and orders. 

With a simple, user-friendly interface, we hope you'll have a great experience with E-Commerce.

## Installing

This project require PHP 8.0 or higher and laravel 9.

Install project's package by using composer:

````
composer install --ignore-platform-reqs
````

Create .env by copy file .env.example and change it to .env and add your database's connection infor.

Create directory storage/framework/views - cache - sessions.

Run command:

- php artisan key:generate
- php artisan migrate
- php artisan db:seed

This project is developed and maintained by <a href="">Nam4eb de Creative</a>.

## License

This open-source software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
