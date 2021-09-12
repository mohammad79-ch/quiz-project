<?php


namespace App\service\questions;


use App\Models\Question;
use App\Models\SubQuestion;

trait DetailQuestion
{

    public function questions()
    {
        return $this->belongsToMany(Question::class,'question_user')
            ->withPivot(['is_correct','select_level']);
    }

    public function subQuestions()
    {
        return $this->belongsToMany(SubQuestion::class,'sub_question_user');
    }

    public function TotalAnswer()
    {
        return $this->questions->count();
    }

    public function getCorrectAnswer()
    {
        $correctCount = $this->questions->filter(fn($q) => $q->pivot->is_correct)->count();

        return $correctCount;
    }

    public function getWrongAnswer()
    {
        $correctCount = $this->questions->filter(fn($q) => !$q->pivot->is_correct)->count();

        return $correctCount;
    }

}
