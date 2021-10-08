<?php

namespace App\Http\Livewire\Like;

use App\Models\Discuss;
use App\Models\Like;
use Livewire\Component;

class LikeComponent extends Component
{

    protected $listeners = ['countLikeR'=>'$refresh'];

    public $discuss ;

    public $countLike = 0;

    public $check = 0;


    public function mount()
    {

        if (auth()->check()){
            $this->check = count($this->discuss->likes->where('user_id',auth()->user()->id)->all());
        }

        $this->countLike = count($this->discuss->likes);
    }

    public function like()
    {
       if (auth()->check()){
           if (count($this->discuss->likes->where('user_id',auth()->user()->id)->all())){
               return false;
           }

           $like = $this->discuss->likes()->make(); //create a like
           $like->user()->associate(auth()->user()); //attach user to a like

           $like->save();

           $this->countLike = $this->discuss->likes()->count();

           $this->discuss->refresh();
       }
    }

    public function unLike()
    {

    if (auth()->check()){
        if (count($this->discuss->likes->where('user_id',auth()->user()->id)->all())){
            auth()->user()->likes()->where('likeable_id',$this->discuss->id)->delete();
        }
        $this->countLike = $this->discuss->likes()->count();

        $this->discuss->refresh();
    }

    }

    public function render()
    {
        return view('livewire.like.like-component');
    }
}
