## About Virtuallab
Virtuallab is a web based application to help Teacher to held a Practicum Activity.

## Installation Instructure
1. clone this repo to your server
2. make sure to stay in `master` branch
3. run `composer install`
4. copy `.env.example` to `.env`
5. modify environment file to your server specification
6. make sure you have your database
7. run `php artisan key:generate`
8. run `php artisan migrate --seed`
9. create your first admin account run `php artisan nova:user` and follow the instruction
10. try your apps

## Application Overview
This application have two main panel whiches *Student Panel* and *Admin Panel*. To access *Admin Panel* go to `/nova` and login with your admin account. To access *Student Panel* just go to `/` and login with your Student Account or create a new one.
