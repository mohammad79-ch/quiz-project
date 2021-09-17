<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\SubQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $question = Question::find(17);
        return [
            'title' =>$this->faker->words(3,true),
            'question_id'=> $question->id,
            'is_answer' => 0
        ];

    }
}
