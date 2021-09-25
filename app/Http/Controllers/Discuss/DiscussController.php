<?php

namespace App\Http\Controllers\Discuss;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discuss;
use Illuminate\Http\Request;

class DiscussController extends Controller
{
    public function index()
    {
        $discusses = Discuss::latest()->paginate();
        return view('discusses.index',compact('discusses'));
    }

    public function create()
    {
        return view('discusses.create');
    }

    public function show(Discuss $discuss)
    {
        dd($discuss);
    }
    public function store(Request $request)
    {
       $discuss =  Discuss::create([
           'title' => $request->title,
           'category_id'=> $request->category,
           'user_id'=> auth()->user()->id,
            'content'=> $request->content,
        ]);

//       $discuss->tags()->sync($request->tags);

//        dd($discuss);

    }
}
