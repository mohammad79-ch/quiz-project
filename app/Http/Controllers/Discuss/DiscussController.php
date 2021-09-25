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
        return view('discusses.show',compact('discuss'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
           'title'=>'required',
            'content'=>'required',
            'category'=>'required',
            'tags'=>'required',
        ]);

        $tags = explode('#', $request->tags);
        $tagsAll = [];
        foreach ($tags as $tag => $key) {
            $tagsAll[] = \App\Models\Tag::firstOrCreate(['name' => $key]);
        }

       $discuss =  Discuss::create([
           'title' => $data['title'],
           'category_id'=> $data['category'],
           'user_id'=> auth()->user()->id,
            'content'=> $data['content'],
        ]);

       $discuss->tags()->sync(collect($tagsAll)->pluck('id'));

       return redirect()->route('discuss');
    }
}
