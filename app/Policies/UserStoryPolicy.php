<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserStoryPolicy
{
    use HandlesAuthorization;

    public function delete(User $user,Image $image)
    {
        return $user->id == $image->user->id;
    }
}
