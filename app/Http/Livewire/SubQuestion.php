<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubQuestion extends Component
{
    public $question ;

    public bool $checkQuestion = false;

    protected $listeners = ['subQuestion'=> '$refresh'];

    public $level ;


    public bool $clicked = false;

    public function mount()
    {
        $checkIfExist = $this->question->users->filter(function ($item){
            return $item->id == auth()->id() && ($item->pivot->is_correct == 1 || $item->pivot->is_correct == 0);
        });

        if (count($checkIfExist)){
            $this->checkQuestion = true;
        }

    }

    public function checkAnswer($subQuestion)
    {
       $sub = \App\Models\SubQuestion::where('id',$subQuestion)->first();
        if ($sub->is_answer){
            $this->checkQuestion = true;
            $this->clicked = true;
            $this->question->users()->attach(auth()->id(),['is_correct'=>1]);

        }else{
            $this->checkQuestion=true;
            $this->question->users()->attach(auth()->id(),['is_correct'=>0]);
        }
    }

    public function render()
    {
        if ($this->level == 'easy'){

            $this->question->level-=1;
            $this->question->save();

        }elseif ($this->level == 'hard'){
            $this->question->level+=1;
            $this->question->save();
        }


        return view('livewire.sub-question');
    }
}
