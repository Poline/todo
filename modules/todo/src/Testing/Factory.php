<?php

namespace Todo\Todo\Testing\Factory;

use Faker\Generator;
use Todo\Todo\Model\Category;

/** @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Category::class, function (Generator $faker) {
    return [
        Category::ID_COLUMN => $faker->uuid,
        Category::NAME_COLUMN => $faker->uuid
    ];
});
