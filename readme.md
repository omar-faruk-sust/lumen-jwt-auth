# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## What is added in this demo project?

- [Lumen 5.6](http://lumen.laravel.com/docs).
- [JWT Auth](https://github.com/tymondesigns/jwt-auth)

## Follow this steps to set-up this project

1. git clone git@github.com:omar-faruk-sust/lumen-jwt-auth.git
2. cd lumen-jwt-auth and run `composer install`
3. Config your .env file (copy example.env file and rename it .env and config it based on your local mysql server)
4. Set your `APP_KEY and JWT_SECRET` on .env file 
   - run `php artisan jwt:secret` to set JWT_SECRET
   - To set `APP_KEY` key check the `routes/web.php` file

uncomment This code

`/*$router->get('/key', function() {
    return str_random(32);
});*/
`
And than hit this url(http://jumen-jwt-auth.local/key) as get method on postman
Set that key as APP_KEY on .env file

Note: In my case i am running my local php(apache) server with vhost(http://jumen-jwt-auth.local)

5. run `php artisan migrate`
6. run `php artisan db:seed` // it will generate fake data into your tables
7. run `composer dump-autoload`
8. run you local server with vhost or boot up your server

`auth/register` is url for user registration. So hit on postman with POST method with this sample payload as body
    
```
{
	"name": "Omar Faruk",
	"email" : "omar@test.com",
	"password" : "123456"
}
```

Hit this url(http://jumen-jwt-auth.local/auth/login) into postman with POST method
provide this sample user payload on postman as body with request

```
{
	"email" : "omar@test.com",
	"password" : "123456"
}
```

In response you will get like this: 
```
{
	"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9qdW1lbi1qd3QtYXV0aC5sb2NhbFwvYXV0aFwvbG9naW4iLCJpYXQiOjE1MzU5NDI1MjYsImV4cCI6MTUzNTk0NjEyNiwibmJmIjoxNTM1OTQyNTI2LCJqdGkiOiJiYTlUTXd5N2p4UzgwSVBBIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.yE-JFEEjA_BUr-wn2zcndu4BwTJss-oKGHQrgax3J3I",
 	"token_type": "bearer",
 	"expires_in": 3600
}
```

This is the url for logout of logged in user. http://jumen-jwt-auth.local/auth/logout
This is a post request and you have to provide `Authorization` & `bearer token` on header to hit this url

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
