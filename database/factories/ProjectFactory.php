<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->sentence(4),
        'owner_id' => function(){
            return factory(User::class)->create()->id;
        }
    ];
});
