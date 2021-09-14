<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use UxWeb\SweetAlert\SweetAlert;

class UserStoryComponent extends Component
{
    use AuthorizesRequests;

    protected $listeners = [
        'fireUserStoryComponent'=>'$refresh'
    ];

    public $images;

    public function deleteStory(Image $image)
    {
        $this->authorize('delete',$image);

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
