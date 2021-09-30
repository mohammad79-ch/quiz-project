<?php

namespace App\Http\Controllers\Discuss;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discuss;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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

        $discusses = Discuss::latest('updated_at')->where('parent_id', '0')->get();

        if (\request()->has('me')) {
            $discusses = auth()->user()->discuss->where('parent_id', '0')->all();
        }

        if (\request()->has('filter_by') && \request('filter_by') == "best_answers") {
            $discusses = Discuss::whereIn('is_answer',auth()->user()->discuss->pluck('id')->all())->get();
        }

        // get all and parent_id = 0
        // get the most replay
        // latest that replay
        // show in view

         if (\request()->has('trending') && \request('trending') == "1") {
             $start = Carbon::now()->subWeek()->startOfWeek();
             $end = Carbon::now()->subWeek()->endOfWeek();
             $discusses = Discuss::withCount('child')
             ->where('parent_id',0)
             ->whereBetween('created_at',[$start,$end])
             ->orderBy('child_count','desc')
             ->get();
         }

         if(\request()->has('popular') && \request('popular') == "1"){
             $discusses = Discuss::withCount('child')
                 ->where('parent_id',0)
                 ->orderBy('child_count','desc')
                 ->get();
         }

        if (\request()->has('filter_by') && \request('filter_by') == "contributed_to") {
            $discusses = auth()->user()->discuss->where('parent_id', '!=', 0)->pluck('id');
            if (count($discusses)) {
                $discusses = Discuss::whereIn('id', $discusses)->get();
            }
        }

        if(\request()->has('answered') && \request('answered') == "1"){
            $discusses = Discuss::where('is_answer',1)->where('parent_id',0)->get();
        }

        $discusses = $this->paginate($discusses, 10);


        return view('discusses.index', compact('discusses'));
    }


    public
    function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return
            new LengthAwarePaginator($items->forPage($page, $perPage),
                $items->count(), $perPage, $page, $options);
    }

    public
    function create()
    {
        return view('discusses.create');
    }

    public
    function show(Discuss $discuss)
    {
        return view('discusses.show', compact('discuss'));
    }

    public
    function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $tags = explode('#', $request->tags);
        $tagsAll = [];
        foreach ($tags as $tag => $key) {
            $tagsAll[] = \App\Models\Tag::firstOrCreate(['name' => $key]);
        }

        $discuss = Discuss::create([
            'title' => $data['title'],
            'category_id' => $data['category'],
            'user_id' => auth()->user()->id,
            'content' => $data['content'],
        ]);

        $discuss->tags()->sync(collect($tagsAll)->pluck('id'));

        return redirect()->route('discuss');
    }

    public
    function replay(Request $request, Discuss $discuss)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);

        $discuss->update(['updated_at' => Carbon::now()]);

        Discuss::create([
            'title' => $discuss->title,
            'category_id' => $discuss->category_id,
            'user_id' => auth()->user()->id,
            'content' => $data['content'],
            'parent_id' => $discuss->id
        ]);

        return back();
    }

    public
    function bestAnswer(Discuss $discuss, $currentDiscuss)
    {
        $currentDiscuss = Discuss::find($currentDiscuss);

        $currentDiscuss->update(['is_answer' => $discuss->id]);
        $discuss->update(['is_answer' => 1]);
        return back();
    }
}
