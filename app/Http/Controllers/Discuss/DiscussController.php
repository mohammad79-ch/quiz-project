<?php

namespace App\Http\Controllers\Discuss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscussController extends Controller
{
    public function index()
    {
        return view('discusses.index');
    }
}
