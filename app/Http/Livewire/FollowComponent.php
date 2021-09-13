<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowComponent extends Component
{

    public $user ;
    public $follower;
    public $following ;

    public function mount()
    {
        $this->follower = $this->user->followers->count();
        $this->following = $this->user->following->count();
    }

    public function follow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->follow($user2);

        if (!is_null($result)){
            $this->follower++;
        }

        return back();
    }

    public function unfollow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->unFollow($user2);

        if (!is_null($result) || $result){
            $this->follower--;
        }

        return back();
    }

    public function render()
    {
        return view('livewire.follow-component');
    }
}
