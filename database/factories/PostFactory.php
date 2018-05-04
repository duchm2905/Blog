<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    return [
        'title'=> $faker->title,
        'content' => $faker->text,
        'description' => $faker->text,
        'link' => $faker->url,
        'pubDate' => $faker->date('Y-m-d H:i:s'),
        'crawler_id'=> 0,
        'category_id' => 1,
        'user_id' => 1
    ];
});
