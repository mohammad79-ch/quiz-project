<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubQuestion extends Component
{
    public $question ;


    public $clicked = false;

    public function checkAnswer($subQuestion)
    {
       $sub = $this->question->subQuestion()->whereId($subQuestion)->first();
        if ($sub->is_answer){
            $this->clicked = true;
            $sub->users()->sync(auth()->id());
        }
    }

    public function render()
    {
        return view('livewire.sub-question');
    }
}
