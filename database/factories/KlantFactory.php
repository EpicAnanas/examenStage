<?php

use Faker\Generator as Faker;
use App\klant;

$factory->define(App\klant::class, function (Faker $faker) {
    return [
      'name' => Str::random(10),
    ];
});
