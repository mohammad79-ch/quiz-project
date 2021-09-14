<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowComponent extends Component
{

    public $user ;
    public $followerCount;
    public $followers;
    public $followingCount ;
    public $followings ;

    public function mount()
    {
        $this->followers = $this->user->followers;
        $this->followerCount = $this->user->followers->count();
        $this->followingCount = $this->user->following->count();
        $this->following = $this->user->following;
    }

    public function follow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->follow($user2);

        if (!is_null($result)){
            $this->followerCount++;
        }

        return back();
    }

    public function unfollow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->unFollow($user2);

        if (!is_null($result) || $result){
            $this->followerCount--;
        }

        return back();
    }

    public function render()
    {
        return view('livewire.follow-component');
    }
}
