<?php

use App\Model\Answer;
use App\Model\Question;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        factory(User::class, 10)->create()->each(function ($u){
            $u->questions()
            ->saveMany(
                factory(Question::class, rand(2, 5))->make()
            )->each(function ($q){
                    $q->answers()->saveMany(factory(Answer::class, rand(2, 6))->make());
                });
        });
    }
}
