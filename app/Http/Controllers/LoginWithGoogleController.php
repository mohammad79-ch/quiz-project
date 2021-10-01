<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $userGet = User::where('email',$user->email)->first();

        if (!is_null($userGet)){
            auth()->loginUsingId($userGet->id,true);
            return redirect('/');
        }

        $user = $this->createUser($user);

        auth()->loginUsingId($user->id,true);
        return redirect('/');

    }

    /**
     * @param \Laravel\Socialite\Contracts\User $user
     * @return mixed
     */
    public function createUser(\Laravel\Socialite\Contracts\User $user)
    {
        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => 0,
        ]);
        return $user;
    }
}
