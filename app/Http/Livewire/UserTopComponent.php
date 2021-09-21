<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class UserTopComponent extends Component
{
    use WithPagination;


    protected $listeners = [
        'fireUserTop' => '$refresh'
    ];

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return
            new LengthAwarePaginator($items->forPage($page, $perPage),
                $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        $questions = Question::with('subQuestion', 'users')->get();

        $usersId = [];

        foreach ($questions as $question) {
            $usersId[] = $question->users->pluck('id')->toArray();
        }

        $usersId = collect($usersId)->collapse()->unique();

        $usersA = User::with('questions')->whereIn('id', $usersId)->get();

        $users = [];

        foreach ($usersA as $user) {
            $correctAnswer = $user->questions->filter(fn($q) => $q->pivot->is_correct)->count();

            $users[] = ['profile' => $user->profile, 'name' => $user->name, 'correctAnswer' => $correctAnswer];
        }

        $users = collect($users)->unique('name')->sortByDesc('correctAnswer')->all();

        $users = $this->paginate($users, 10);


        return view('livewire.user-top-component', compact('users'));
    }
}
