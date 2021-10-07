<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i<=6 ; $i++){
          User::factory(1)->create(['email'=>"user$i@gmail.com"]);
        }

        User::factory(4)->create();

        $question = Question::factory()->create();
        $question2 = Question::factory()->create();
        $question3 = Question::factory()->create();
        $question4 = Question::factory()->create();
        for ($i=1;$i<=4;$i++){
            if ($i == 4){
              SubQuestion::factory(1)->create(['is_answer'=>1,'question_id'=>$question->id]);
            }else{
                SubQuestion::factory(1)->create(['question_id'=>$question->id]);
            }
        }

        for ($i=1;$i<=4;$i++){
            if ($i == 2){
                SubQuestion::factory(1)->create(['is_answer'=>1,'question_id'=>$question2->id]);
            }else{
                SubQuestion::factory(1)->create(['question_id'=>$question2->id]);
            }
        }

        for ($i=1;$i<=4;$i++){
            if ($i == 1){
                SubQuestion::factory(1)->create(['is_answer'=>1,'question_id'=>$question3->id]);
            }else{
                SubQuestion::factory(1)->create(['question_id'=>$question3->id]);
            }
        }
        for ($i=1;$i<=4;$i++){
            if ($i == 3){
                SubQuestion::factory(1)->create(['is_answer'=>1,'question_id'=>$question4->id]);
            }else{
                SubQuestion::factory(1)->create(['question_id'=>$question4->id]);
            }
        }
    }

}
