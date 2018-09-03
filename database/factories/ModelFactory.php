<?php
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->unique()->email,
        'password' => bcrypt('12345'),
    ];
});*/


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});


$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'github' => 'testDummy',
        'twitter' => 'testDummyTWT',
        'location' => 'Montreal',
        'latest_article_published' => 'Lumen WIth JWT',
    ];
});
