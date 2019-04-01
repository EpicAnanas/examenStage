<?php

use Faker\Generator as Faker;
use App\utm;
use App\klant;
use Carbon\Carbon;

$factory->define(utm::class, function (Faker $faker) {
    return [
      'url' => Str::random(10),
      'source' => Str::random(10),
      'medium' => Str::random(10),
      'name' => Str::random(10),
      'term' => Str::random(10),
      'content' => Str::random(10),
      'klant' => Str::random(1),
      'created_at' => Carbon::parse('1999-09-09'),
      'updated_at' => Carbon::parse('1999-09-09'),
    ];
});

// public function run()
// {
//     factory(App\utm::class, 50)->create()->each(function ($utm) {
//         $utm->posts()->save(factory(App\Post::class)->make());
//     });
// }
