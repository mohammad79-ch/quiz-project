<div>
    <div class="col-12">
        <div class="d-flex mt-3 flex-wrap">
            @foreach($images as $image)
                <div class="ml-2" style="margin-left: 5px">
                    <img src="{{asset('storage/photos/'.$image->url)}}" width="50"
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
                    <span><a href="" wire:click.prevent="deleteStory('{{$image->id}}')" class="text-danger font-weight-bold">x</a></span>
                @endif
            @endforeach
        </div>
    </div>

</div>
