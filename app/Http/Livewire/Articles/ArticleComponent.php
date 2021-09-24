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

    public $category ;


    protected $queryString = ['order'];

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
            $articles = $articles->oldest();
        }else{
            $articles = $articles->latest();
        }

           $articles = $articles->paginate();

        if ($this->tag){
          $articles = Tag::where('name',$this->tag)->first()->articles;
        }

        if ($this->category){
            $category = Category::where('name',$this->category)->first();
            if (!is_null($category)){
                $articles = $category->articles;
            }
        }





        return view('livewire.articles.article-component',compact('articles'))
            ->layout('layouts.base');
    }

}
