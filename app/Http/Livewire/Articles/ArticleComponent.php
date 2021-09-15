<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComponent extends Component
{
    use WithPagination;

    public function render()
    {

        $articles = Article::with('user')
            ->whereStatus(1)
            ->paginate(20);

        return view('livewire.articles.article-component',compact('articles'))
            ->layout('layouts.base');

    }
}
