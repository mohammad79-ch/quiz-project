<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubQuestion extends Component
{
    public $question ;

    public bool $checkF = false;

    protected $listeners = ['subQuestion'=> '$refresh'];


    public bool $clicked = false;

    public function mount()
    {
        $checkIfExist = $this->question->users->filter(function ($item){
            return $item->id == auth()->id() && $item->pivot->is_correct == 1 || $item->pivot->is_correct == 0;
        });

        if (count($checkIfExist)){
            $this->checkF = true;
        }

    }

    public function checkAnswer($subQuestion)
    {
       $sub = \App\Models\SubQuestion::where('id',$subQuestion)->first();
        if ($sub->is_answer){
            $this->checkF = true;
            $this->clicked = true;
            $this->question->users()->attach(auth()->id(),['is_correct'=>1]);

        }else{
            $this->checkF=true;
            $this->clicked = true;

            $this->question->users()->attach(auth()->id(),['is_correct'=>0]);
        }
    }

    public function render()
    {
        return view('livewire.sub-question');
    }
}
