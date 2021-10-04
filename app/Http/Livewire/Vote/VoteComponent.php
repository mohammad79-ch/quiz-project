<?php

namespace App\Http\Livewire\Vote;

use Livewire\Component;

class VoteComponent extends Component
{
    public $discuss;

    public function render()
    {
        return view('livewire.vote.vote-component');
    }

    public function increase(): bool
    {
        if(is_null($this->discuss->users('user_id',auth()->user()->id)->first())){
            $this->discuss->users()->attach(auth()->user()->id);
            $this->countVote = count($this->discuss->users);

            $this->discuss->vote++;
            $this->discuss->save();
        }

        $this->discuss->refresh();

        return false;
    }

    public function decrease(): bool
    {
        if(!is_null($this->discuss->users('user_id',auth()->user()->id)->first())){
            $this->discuss->users()->detach(auth()->user()->id);

            $this->discuss->vote--;
            $this->discuss->save();
        }

        $this->discuss->refresh();

        return false;
    }
}
