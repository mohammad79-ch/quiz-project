<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComponent extends Component
{
    use WithPagination;

    public $order;

    protected $queryString = ['order'];

    public function render()
    {
        $articles = [];

        $users = auth()->user()->following;

        foreach ($users as $user){
            foreach ($user->articles as $article){
               $articles[] = $article;
            }
        }
        $articles = collect($articles)->pluck('id')->toArray();

        $articles = Article::with(['user','tags'])->whereIn('id',$articles)->paginate(20);

        return view('livewire.articles.article-component',compact('articles'))
            ->layout('layouts.base');

    }
}
