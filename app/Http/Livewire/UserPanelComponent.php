<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserPanelComponent extends Component
{

    public $profile;

    public function mount($profile)
    {
        $this->profile = $profile;
    }

    public function render()
    {
            $user = User::with('articles')->whereProfile($this->profile)->first();

            $totalAnswer = $user->totalAnswer();

            $correctAnswer = $user->getCorrectAnswer();

            $wrongAnswer = $user->getWrongAnswer();


            return view('livewire.user-panel-component',
                compact('user', 'totalAnswer', 'correctAnswer', 'wrongAnswer'))
                ->layout('layouts.base');
        }

}
