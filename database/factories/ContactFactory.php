<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Contact::class, function (Faker $faker) {
    return [
        //
        'number' => str_random(12),
    ];
});
