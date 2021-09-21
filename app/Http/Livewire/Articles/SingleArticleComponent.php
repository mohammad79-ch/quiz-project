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
        $this->relative = Tag::whereIn('id',$this->article->tags->pluck('id')->toArray())->first()->articles ;

        $relative = [];

        foreach ($this->relative as $rel){
            if ($rel->title != $this->article->title){
                $relative[] = $rel;
            }
        }

        $relativeCollection = $relative;


        return view('livewire.articles.single-article-component',compact('relativeCollection'))
            ->layout('layouts.base');
    }

}
