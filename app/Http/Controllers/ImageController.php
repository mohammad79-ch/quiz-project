<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use UxWeb\SweetAlert\SweetAlert;

class ImageController extends Controller
{
    public function index()
    {

    }

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
        $this->authorize('delete',$image);

        $image->delete();
        return back();
    }
}
