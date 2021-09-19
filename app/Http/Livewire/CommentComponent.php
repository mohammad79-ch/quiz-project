<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentComponent extends Component
{
    public $article;
    public $content;

    protected $rules = [
        'content'=>'required'
    ];

    public function saveComment()
    {
        $this->validate();

        auth()->user()->comments()->create([
           'content'=>$this->content,
           'commentable_id'=>$this->article->id,
           'commentable_type'=>get_class($this->article)
        ]);

        session()->flash('successComment','Comment sent ');
    }
    public function render()
    {
        return view('livewire.comment-component');
    }
}
