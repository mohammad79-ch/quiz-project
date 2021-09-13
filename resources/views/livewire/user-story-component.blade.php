<div class="row">
    <div class="col-12">
        <div class="d-flex mt-3">
            @foreach($images as $image)
                <div class="ml-2" style="margin-left: 5px">
                    <img src="{{asset('storage/UserStory/'.$image->url)}}" width="50"
                         class="rounded-circle border" alt="">
                    <p style="font-size: 14px" class="font-weight-bold">
                        <a
                            href="{{route('profile',$image->user->profile)}}">{{shorter($image->user->profile,7)}}
                        </a>
                        <br>
                        {{--                                <a href="" >{{$image->created_at->diffForHumans()}}</a>--}}
                    </p>
                </div>
                @if(auth()->id() == $image->user->id)
                    <span><a href=""
                             onclick="event.preventDefault();document.getElementById('user.delete.story{{$image->id}}').submit()"
                             class="text-danger font-weight-bold">x</a></span>
                    <form
                        action="{{route('user.delete.story',['profile'=>auth()->user()->profile,'image'=>$image])}}"
                        method="post"
                        id="user.delete.story{{$image->id}}">
                        @csrf
                        @method("DELETE")
                    </form>
                @endif
            @endforeach
        </div>
    </div>
    @auth
        <div class="col-12 mt-3">
            <form wire:submit="" method="post"
                  enctype="multipart/form-data">
                @csrf
                <span class="font-weight-bold">Choose The Image For Story</span>
                <div class="form-group d-flex mt-3">
                    <input type="file" class="form-control  form-control-file" name="url">
                    <input type="submit" value="publish" class="btn btn-success">
                </div>
            </form>
        </div>
    @endauth
</div>
