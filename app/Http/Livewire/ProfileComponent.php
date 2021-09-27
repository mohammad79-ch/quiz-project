<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Discuss;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProfileComponent extends Component
{

    use AuthorizesRequests;

    public $profile;

    public function mount($profile)
    {
        $this->profile = $profile;
    }

    public function deleteArticle($slug)
    {
       $article = Article::whereSlug($slug)->first();
        $this->authorize('delete',$article);
        $article->delete();
    }

    public function render()
    {
            $user = User::with('articles')->whereProfile($this->profile)->first();

            $totalAnswer = $user->totalAnswer();

            $correctAnswer = $user->getCorrectAnswer();

            $wrongAnswer = $user->getWrongAnswer();

            return view('livewire.profile-component',
                compact('user', 'totalAnswer', 'correctAnswer', 'wrongAnswer'))
                ->layout('layouts.base');
        }

}
