<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index($profile)
    {
        $user = User::whereProfile($profile)->first();

        $totalAnswer = $user->totalAnswer();

        $correctAnswer = $user->getCorrectAnswer();

        $wrongAnswer = $user->getWrongAnswer();

        return view('panel.index',
            compact('user','totalAnswer','correctAnswer','wrongAnswer'));
    }


    public function follow($profile)
    {
        $user2 = User::where('profile', $profile)->first();

        auth()->user()->follow($user2);

        return back();
    }
    }
