<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubQuestion extends Component
{
    public $question ;

    protected $listeners = ['subQuestion'=> '$refresh'];


    public $clicked = false;



    public function checkAnswer($subQuestion)
    {
       $sub = \App\Models\SubQuestion::where('id',$subQuestion)->first();
        if ($sub->is_answer){
            $this->clicked = true;
            $this->question->users()->attach(auth()->id(),['is_correct'=>1]);

        }else{
            $this->clicked = true;

            $this->question->users()->attach(auth()->id(),['is_correct'=>0]);
        }
    }

    public function render()
    {
        return view('livewire.sub-question');
    }
}
