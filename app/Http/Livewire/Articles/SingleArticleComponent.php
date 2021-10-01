<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Tag;
use Livewire\Component;

class SingleArticleComponent extends Component
{
    public $relative;
     public $article;
    public function mount(Article $article)
    {
       $this->article = $article;
    }

    public function render()
    {
        $this->relative = Tag::whereIn('id',$this->article->tags->pluck('id')->toArray())->get() ;

        $relative = [];

        foreach ($this->relative as $rel){
          foreach ($rel->articles as $article){
              $relative[]= $article;
          }
        }

        $relativeCollection = collect($relative)->unique('id');

        $relativeCollection = $relativeCollection->filter(fn($item) => $item->title != $this->article->title );

        return view('livewire.articles.single-article-component',compact('relativeCollection'))
            ->layout('layouts.base');
    }

}
