<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'owner_id' => function(){
            return factory(User::class)->create()->id;
        }
    ];
});
