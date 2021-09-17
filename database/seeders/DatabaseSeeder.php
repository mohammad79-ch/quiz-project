<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\SubQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $question = Question::factory()->create();
         SubQuestion::factory(4)->create(['question_id'=>$question->id]);
    }

}
