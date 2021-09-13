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

           $this->following()->attach($user);
            return TRUE;
        }

        return null;
    }

    public function unFollow($user)
    {
        if ($this->isFollowing($user)){
         $this->following()->detach($user);
         return true;
        }

    }

    public function isFollowing($user)
    {
        return !!$this->following()->where('following_id',$user->id)->count();
    }

    public function isFollowinBy($user)
    {
        return !! $this->followers()->where('follower_id',$user->id)->count();
    }

}
