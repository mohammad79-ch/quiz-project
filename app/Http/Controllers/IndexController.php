<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

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

        $users=collect($users)->unique('name')->all();

        $users=$this->paginate($users,10);




        return view('index',compact('questions','users'));
    }
    
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
