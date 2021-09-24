<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComponent extends Component
{
    use WithPagination;

    public $order;

    public $tag ;

    public $search ;

    public $category ;


    protected $queryString = ['order','search'];

    public function findTags($tag)
    {
        $this->tag = $tag;
    }

    public function findCategories($category)
    {
        $this->category =  $category;
    }

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

        $articles = Article::with(['user','tags'])->whereIn('id',$articles);

        if ($this->order == 'oldest'){
            $articles = $articles->oldest()->get();
        }else{
            $articles = $articles->latest()->get();
        }

        if ($this->tag){
          $articles = Tag::where('name',$this->tag)->first()->articles;
        }

        if ($this->category){
            $category = Category::where('name',$this->category)->first();
            if (!is_null($category)){
                $articles = $category->articles;
            }
        }

        if($this->search){
        $articles = Article::where('title','LIKE',"%{$this->search}%")->get();
        }

        return view('livewire.articles.article-component',compact('articles'))
            ->layout('layouts.base');
    }

}
