# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).


## Follow this steps to set-up this project

1. git clone git@github.com:omar-faruk-sust/lumen-jwt-auth.git
2. cd lumen-jwt-auth
3. Config your .env file (copy example.env file and rename it .env and config it based on your local mysql server)
4. Set your `APP_KEY and JWT_SECRET` (run php artisan jwt:secret to set JWT_SECRET) on .env file
To set APP_KEY key check the routes/web.php file

uncomment This code

`/*$router->get('/key', function() {
    return str_random(32);
});*/
`
And than hit this url(http://jumen-jwt-auth.local/key) as get method on postman
Set that key as APP_KEY on .env file

5. php artisan migrate
6. php artisan db:seed // it will generate fake data into your tables
7. composer dump-autoload
8. run you local server with vhost.
In my case i am running my local php(apache) server with vhost(http://jumen-jwt-auth.local)

Hit this url(http://jumen-jwt-auth.local/auth/login) into postman with GET method
provide this payload on postman as body with request

`{
    "email" : "rolando.blick@example.com", // change it based on your data on users table
    "password" : "secret" // for all you fake data password is this
}`

In response you will get like this: 

`{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9qdW1lbi1qd3QtYXV0aC5sb2NhbFwvYXV0aFwvbG9naW4iLCJpYXQiOjE1MzU5NDI1MjYsImV4cCI6MTUzNTk0NjEyNiwibmJmIjoxNTM1OTQyNTI2LCJqdGkiOiJiYTlUTXd5N2p4UzgwSVBBIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.yE-JFEEjA_BUr-wn2zcndu4BwTJss-oKGHQrgax3J3I",
    "token_type": "bearer",
    "expires_in": 3600
}`


## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
