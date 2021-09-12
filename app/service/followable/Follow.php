<?php


namespace App\service\followable;


use App\Models\User;

trait Follow
{
    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','following_id','follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class,'follows','follower_id','following_id');
    }

    public function follow($user)
    {
        if (!$this->isFollowing($user) && $user->id != $this->id){
        return $this->following()->attach($user);
        }
    }

    public function unFollow($user)
    {
        return $this->following()->detach($user);
    }

    public function isFollowing($user)
    {
        return !!$this->followers()->where('following_id',$user->id)->first();
    }

    public function isFollowinBy($user)
    {
        return $this->following()->where('follower_id',$user->id);
    }

}
