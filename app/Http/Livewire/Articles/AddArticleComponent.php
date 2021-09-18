<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddArticleComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $status;
    public $slug;
    public $category_id;
    public $tags = [];

    protected $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:10',
        'image' => 'required|mimes:jpeg,jpg,png,gif,webp|required|max:10000',
        'status' => 'required',
        'slug' => 'required',
        'category_id' => 'required',
    ];

    public function createArticle()
    {
        $this->validate();

        $imageName = md5($this->image . microtime()) . '.' . $this->image->extension();

        $this->image->storeAs('articles', $imageName);


        auth()->user()->articles()->create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imageName,
            'status' => $this->status,
            'slug' => Str::slug($this->slug),
            'category_id'=>$this->category_id
        ]);

        session()->flash('createArticle', 'Article has been created successfully');
    }


    public function render()
    {
        return view('livewire.articles.add-article-component')->layout('layouts.base');
    }
}
