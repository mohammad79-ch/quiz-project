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
        if (auth()->check()) {
            if ($this->discuss->vote == 0) {
                $this->discuss->users()->syncWithPivotValues(auth()->user()->id, ['status' => 1]);
                $this->discuss->vote++;
                $this->discuss->save();
            }

            if (!is_null($this->discuss->users()->wherePivot('user_id', auth()->id())->wherePivot('status', -1)->first())) {

                $this->discuss->users()->syncWithPivotValues(auth()->user()->id, ['status' => 1]);
                $this->discuss->vote++;
                $this->discuss->save();

            }

            $this->discuss->refresh();

        }

            return false;

    }

    public function decrease(): bool
    {
        if (auth()->check()){

            if($this->discuss->vote == 0){
                $this->discuss->users()->syncWithPivotValues(auth()->user()->id,['status'=>-1]);
                $this->discuss->vote--;
                $this->discuss->save();
            }

            if(!is_null($this->discuss->users()->wherePivot('user_id',auth()->id())->wherePivot('status',1)->first())){

                $this->discuss->users()->syncWithPivotValues(auth()->user()->id,['status'=>-1]);
                $this->discuss->vote--;
                $this->discuss->save();
            }



            $this->discuss->refresh();

            return false;
        }
    }
}
