<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $questions = Question::with('subQuestion','users')->get();

        $users = [];

        foreach ($questions as $question){
            foreach ($question->users as $user){
                $users[]=$user;
            }
        }

        return view('index',compact('questions','users'));
    }
}
