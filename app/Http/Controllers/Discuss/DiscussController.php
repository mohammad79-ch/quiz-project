<?php

namespace App\Http\Controllers\Discuss;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discuss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class DiscussController extends Controller
{
    public function index()
    {
//        $discusses = DB::table('discusses')
//            ->join('discuss_tag','discusses.id','=','discuss_tag.discuss_id')
//            ->join('tags','tags.id','=','discuss_tag.tag_id')
//            ->join('users','discusses.user_id','=','users.id')
//            ->where('parent_id',0)
//            ->orderBy('discusses.id','desc')
//            ->select('discusses.*', 'discuss_tag.*', 'tags.*','users.*')
//            ->get();

        $discusses = Discuss::with(['user','tags','child'])
            ->where('parent_id','0')
            ->latest()->paginate();

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

    public function replay(Request $request,Discuss $discuss)
    {
        $data = $request->validate([
            'content'=>'required',
        ]);

          Discuss::create([
            'title' => $discuss->title,
            'category_id'=> $discuss->category_id,
            'user_id'=> auth()->user()->id,
            'content'=> $data['content'],
            'parent_id'=> $discuss->id
        ]);

        return back();
    }
}
