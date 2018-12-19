<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'		=> $faker->text(30),
        'synopsis'	=> $faker->text(150),
        'publish_year'	=> $faker->year()
    ];
});
