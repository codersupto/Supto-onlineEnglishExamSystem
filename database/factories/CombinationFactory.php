<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Vocabulary\Combination\Combination;
use Faker\Generator as Faker;

$factory->define(Combination::class, function (Faker $faker) {
    return [
        'exam_id' => 1,
        'question_set_id' => 1,
        'word' => $faker->word,
        'combination_option_id' => 1
    ];
});
