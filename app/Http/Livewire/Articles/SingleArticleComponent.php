<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class SingleArticleComponent extends Component
{
     public $article;
    public function mount(Article $article)
    {
       $this->article = $article;
    }
    public function render()
    {
        return view('livewire.articles.single-article-component')->layout('layouts.base');
    }
}
