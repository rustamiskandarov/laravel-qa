<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Model\Answer;
use App\Model\Question;
use App\User;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body'=> $faker->paragraphs(rand(3, 5), true),
        'user_id'=> User::pluck('id')->random(),
        'question_id'=> Question::pluck('id')->random(),
        'votes_count' => rand(0, 10),
    ];
});
