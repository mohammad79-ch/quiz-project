<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubQuestion extends Component
{
    public $question;

    public bool $checkQuestion = false;

    protected $listeners = ['subQuestion' => '$refresh'];

    public $level;

    public $selectEasy = false;
    public $selectHard = false;


    public bool $clicked = false;

    public function mount()
    {
        $checkIfExist = $this->question->users->filter(function ($item) {
            return $item->id == auth()->id() && !is_null($item->pivot->is_correct);
        });

        $selectEasy = $this->question->users->filter(function ($item) {
            return $item->id == auth()->id() && $item->pivot->select_level == 1;
        });

        $selectHard = $this->question->users->filter(function ($item) {
            return $item->id == auth()->id() && $item->pivot->select_level == 2;
        });

        if (count($selectHard)) {
            $this->selectHard = true;
        }

        if (count($selectEasy)) {
            $this->selectEasy = true;
        }


        if (count($checkIfExist)) {
            $this->checkQuestion = true;
        }

    }

    public function checkAnswer($subQuestion)
    {
        $checkIfAlreadyAnswer = $this->question->users->filter(function ($item){
           return $item->pivot->user_id == auth()->id() ;
        });

        $sub = \App\Models\SubQuestion::where('id', $subQuestion)->first();
        if ($sub->is_answer && !count($checkIfAlreadyAnswer)) {
            $this->checkQuestion = true;
            $this->clicked = true;
            $this->question->users()->attach(auth()->id(),['is_correct' => 1]);

        } else {
            $this->checkQuestion = true;
            $this->question->users()->attach(auth()->id() ,['is_correct' => 0]);
        }
    }

    public function render()
    {

        $checkIfAlreadyAnswer = $this->question->users->filter(function ($item){
            return $item->pivot->user_id == auth()->id() ;
        });

        if ($this->level == 'easy' && count($checkIfAlreadyAnswer)) {

            $this->question->level += 1;
            $this->question->save();

            $this->question->users()->wherePivot('user_id', auth()->id())
                ->sync([auth()->id() => ['select_level' => 1]]);


        } elseif ($this->level == 'hard' && count($checkIfAlreadyAnswer)) {
            $this->question->level -= 1;
            $this->question->save();
            $this->question->users()->wherePivot('user_id', auth()->id())
                ->sync([auth()->id() => ['select_level' => 2]]);

        }
        elseif ($this->level == 'easy' || $this->level == 'hard'){
            echo "<script>alert('At first select answer')</script>";
        }


return view('livewire.sub-question');

}
}
