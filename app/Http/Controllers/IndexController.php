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


        $users = [];

        foreach ($questions as $question){
            foreach ($question->users as $user){
                $correctAnswer= $user->questions->filter(fn($q) => $q->pivot->is_correct)->count();
                $users[] = ['profile'=>$user->profile,'name'=>$user->name,'correctAnswer'=>$correctAnswer];
            }
        }

        $users=collect($users)->unique('name')->sortByDesc('correctAnswer')->all();

        $users=$this->paginate($users,10);


        return view('index',compact('questions','users','images'));
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return
            new LengthAwarePaginator($items->forPage($page, $perPage),
                $items->count(),$perPage, $page, $options);
    }

}
