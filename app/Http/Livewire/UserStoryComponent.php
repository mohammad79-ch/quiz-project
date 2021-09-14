<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use UxWeb\SweetAlert\SweetAlert;

class UserStoryComponent extends Component
{
    protected $listeners = [
        'fireUserStoryComponent'=>'$refresh'
    ];

    public $images;

    public function deleteStory(Image $image)
    {
        if (!$image->user->name == auth()->id()) {
            return abort(403);
        }

        if (File::exists(public_path('storage/photos'.$image->url))){
            File::delete(public_path('storage/photos'.$image->url));
        }

        $image->delete();

    }

    public function render()
    {
        $this->images = Image::with('user')->where('expired','>',now())->get();

        return view('livewire.user-story-component');
    }
}
