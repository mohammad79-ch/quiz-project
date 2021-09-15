<?php

namespace App\Http\Livewire\Articles;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticleComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $status;

    protected $rules = [
        'title'=>'required|min:5',
        'content' => 'required|min:10',
        'image' => 'required|mimes:jpeg,jpg,png,gif,webp|required|max:10000',
        'status'=> 'required'
    ];
    public function editArticle()
    {
        $this->validate();

        $imageName = md5($this->image . microtime()).'.'.$this->image->extension();

        $this->image->storeAs('articles',$imageName);



        auth()->user()->articles()->create([
            'title' => $this->title,
            'content'=>$this->content,
            'image'=>$this->image,
            'status'=>$this->status
        ]);

        session()->flash('createArticle','Article has been created successfully');
    }

    public function render()
    {
        return view('livewire.edit-article-component');
    }
}
