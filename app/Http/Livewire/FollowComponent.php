<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowComponent extends Component
{
    protected $listeners = ['refreshfollow'=>'$refresh'];

    public $user ;
    public $followerCount;
    public $followers;
    public $followingCount ;
    public $followings ;

    public $isFollowinBy = null;

    public function follow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->follow($user2);

        if (!is_null($result)){
            $this->followerCount++;
        }

        $this->emit('refreshfollow');
    }

    public function unfollow()
    {
        $user2 = User::where('profile', $this->user->profile)->first();

        $result = auth()->user()->unFollow($user2);

        if (!is_null($result) || $result){
            $this->followerCount--;
        }

        $this->emit('refreshfollow');
    }

    public function render()
    {
        $this->followers = $this->user->followers;
        $this->followerCount = $this->user->followers->count();
        $this->followings = $this->user->following;
        $this->followingCount = $this->user->following->count();

        if (auth()->check()){
            $this->isFollowinBy = $this->user->isFollowinBy(auth()->user());
        }

        return view('livewire.follow-component');
    }

}
