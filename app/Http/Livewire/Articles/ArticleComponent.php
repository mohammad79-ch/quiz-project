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
        $articles = Article::with(['user','category'])->whereStatus(1);

        if ($this->order == "oldest"){
            $articles = $articles->oldest();
        }elseif ($this->order == "latest"){
            $articles = $articles->latest();
        }

        $articles = $articles->paginate(20);

        return view('livewire.articles.article-component',compact('articles'))
            ->layout('layouts.base');

    }
}
