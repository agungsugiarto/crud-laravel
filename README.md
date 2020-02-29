<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

Laravel Simple CRUD
======================

Laravel Simple CRUD. demo provides basic CRUD web application in Laravel.


## Installation
1. CLONE the package via the command line:
```js
  git clone https://github.com/agungsugiarto/crud-laravel.git
```
2. Change into the working directory
```
  cd crud-laravel
```
3. Open Project in a Code Editor, rename `.env.example` to `.env` and modify DB name, username, password to your environment.

4. Install composer dependencies
```
  composer install
```
5. An application key can be generated with the command
```
  php artisan key:generate
```
6. Migrate the database
```
  php artisan migrate
```
7. Sedd the database
```
  php artisan db:seed
```
8. Run the artisan serve command
```
  php artisan serve
```
9. Proceed to
```
  http://localhost:8000/
```

## Demo on [Heroku](https://transisi-laravel.herokuapp.com/)
```
  email: admin@transisi.id
  password: password

  you can also create user.
```

But sad news the heroku is limitation with `php artisan storage:link`.



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
