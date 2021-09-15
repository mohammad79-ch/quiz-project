<?php

namespace App\Http\Livewire\Articles;

use Livewire\Component;

class AddArticleComponent extends Component
{
    public function render()
    {
        return view('livewire.articles.add-article-component')->layout('layouts.base');
    }
}
