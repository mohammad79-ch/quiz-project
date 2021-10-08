<?php

namespace App\Http\Controllers\Discuss;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discuss;
use App\Models\User;
use App\Notifications\sendNotifToOwnDiscussWhenHisDiscussHasRepliedNotification;
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
        $discusses = Discuss::latest('updated_at')->where('parent_id', '0')->get();

        if (\request()->has('me')) {
            $discusses = $this->getMyDiscusses();
        }

        if (\request()->has('filter_by') && \request('filter_by') == "best_answers") {
            $discusses = $this->getBestAnswer();
        }

         if (\request()->has('trending') && \request('trending') == "1") {
             $discusses = $this->getMostRepliesInWeek();
         }

         if(\request()->has('popular') && \request('popular') == "1"){
             $discusses = $this->getMostRepliesAllTime();
         }

        if (\request()->has('filter_by') && \request('filter_by') == "contributed_to") {
            $discusses = $this->getMyContributed();
        }

        if(\request()->has('answered') && \request('answered') == "1"){
            $discusses = $this->getSolved();
        }

        if(\request()->has('answered') && \request('answered') == "0"){
            $discusses = $this->getUnsolved();
        }

        if(\request()->has('fresh') && \request('fresh') == "1"){
            $discusses = $this->getNoRepliesSoFar();
        }


        $discusses = $this->paginate($discusses, 10);


        return view('discusses.index', compact('discusses'));
    }


    function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return
            new LengthAwarePaginator($items->forPage($page, $perPage),
                $items->count(), $perPage, $page, $options);
    }

    function create()
    {
        return view('discusses.create');
    }

    function show(Discuss $discuss)
    {
        return view('discusses.show', compact('discuss'));
    }

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

    function replay(Request $request, Discuss $discuss)
    {
        $userOwnDisucss = $discuss->user;

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

        $userReplied = auth()->user();

        $userOwnDisucss->notify(new sendNotifToOwnDiscussWhenHisDiscussHasRepliedNotification($userReplied));

        return back();
    }

    function bestAnswer(Discuss $discuss, $currentDiscuss)
    {
        $currentDiscuss = Discuss::find($currentDiscuss);

        $currentDiscuss->update(['is_answer' => $discuss->id]);
        $discuss->update(['is_answer' => 1]);
        return back();
    }

    /**
     * @return mixed
     */
    public function getMyDiscusses()
    {
        $discusses = auth()->user()->discuss->where('parent_id', '0')->all();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getBestAnswer()
    {
        $discusses = Discuss::whereIn('is_answer', auth()->user()->discuss->pluck('id')->all())->get();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getMostRepliesInWeek()
    {
        $start = Carbon::now()->subWeek()->startOfWeek();
        $end = Carbon::now()->subWeek()->endOfWeek();
        $discusses = Discuss::withCount('child')
            ->where('parent_id', 0)
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('child_count', 'desc')
            ->get();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getMostRepliesAllTime()
    {
        $discusses = Discuss::withCount('child')
            ->where('parent_id', 0)
            ->orderBy('child_count', 'desc')
            ->get();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getMyContributed()
    {
        $discusses = auth()->user()->discuss->where('parent_id', '!=', 0)->pluck('id');
        if (count($discusses)) {
            $discusses = Discuss::whereIn('id', $discusses)->get();
        }
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getSolved()
    {
        $discusses = Discuss::where('is_answer', 1)->where('parent_id', 0)->get();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getUnsolved()
    {
        $discusses = Discuss::where('parent_id', 0)
            ->where('is_answer', 0)->get();
        return $discusses;
    }

    /**
     * @return mixed
     */
    public function getNoRepliesSoFar()
    {
        $discusses = Discuss::withCount('child')
            ->where('parent_id', 0)
            ->get()->filter(fn($dis) => $dis->child_count == 0);
        return $discusses;
    }
}
