<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class IndexController extends Controller
{
    public function index()
    {

        $images = Image::with('user')->where('expired','>',now())->get();

        $questions = Question::with('subQuestion','users')->get();


        return view('index',compact('questions','images'));
    }



}
