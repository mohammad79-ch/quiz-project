<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use UxWeb\SweetAlert\SweetAlert;

class UserStoryComponent extends Component
{
    public $images ;

    public function saveUserStory($profile,Request $request)
    {
        if ($request->hasFile('url')){
            $getName = Str::random('7').'-'.$request->file('url')->getClientOriginalName();

            $request->file('url')->storeAs(
                'UserStory',
                $getName,
                'public'
            );

            auth()->user()->images()->create([
                'url'=>$getName,
                'alt'=>Str::slug("simple slug for $profile profile"),
                'expired'=>now()->addDay()
            ]);

            SweetAlert::success('your story has been published','wef');
        }


        return back();
    }

    public function deleteUserStory($profile,Image $image)
    {
        if (!$image->user->name == auth()->id()){
          return  abort(403);
        }

        $image->delete();
        return back();
    }
    public function render()
    {
        return view('livewire.user-story-component');
    }
}
