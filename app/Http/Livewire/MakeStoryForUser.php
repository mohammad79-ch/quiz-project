<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class MakeStoryForUser extends Component
{
    use WithFileUploads;

    public $photo;
    public $name;

    protected $rules = [
        'photo' => 'required|mimes:jpeg,jpg,png,gif,webp|required|max:10000',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function saveUserStory()
    {
        $this->validate();

        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

        $this->photo->storeAs('photos',$name);

        $this->createImageStory($name);

        $this->emit('fireUserStoryComponent');

    }

    public function render()
    {
        return view('livewire.make-story-for-user');
    }

    /**
     * @param string $name
     */
    public function createImageStory(string $name): void
    {
        auth()->user()->images()->create([
            'url' => $name,
            'alt' => Str::slug("simple slug for profile" . auth()->user()->profile),
            'expired' => now()->addDay()
        ]);
    }
}
