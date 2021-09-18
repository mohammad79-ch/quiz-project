<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticleComponent extends Component
{
    use WithFileUploads;

    public $article;
    public $title;
    public $content;
    public $image;
    public $status;
    public $newImage;
    public $slug;
    public $category_id;

    protected $rules = [
        'title' => 'required|min:2',
        'content' => 'required|min:2',
        'newImage' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000',
        'status' => 'required',
        'category_id' => 'required'
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->status = $article->status;
        $this->image = $article->image;
        $this->slug = $article->slug;
    }

    public function editArticle()
    {
        $this->validate();

        if (!is_null($this->newImage)) {
            if (File::exists(public_path('storage/articles/' . $this->image))) {
                File::delete(public_path('storage/articles/' . $this->image));
            }

            $imageName = md5($this->newImage . microtime()) . '.' . $this->newImage->extension();

            $this->newImage->storeAs('articles', $imageName);

            $this->image = $imageName;
        }


        $this->article->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'status' => $this->status,
            'slug' => $this->slug,
            'category_id'=>$this->category_id
        ]);

        session()->flash('editArticle', 'Article has been updated successfully');
    }

    public function render()
    {
        return view('livewire.articles.edit-article-component')->layout('layouts.base');
    }
}
