<div>
    <div class="send_comment">
        <div style="width: 95%;margin: 0 auto">
            <div class="d-flex  align-items-center">
                <div class="titleComment"><h4 class="font-weight-bold mb-3"> Put your comment</h4></div>
                @if(session()->has('successComment'))
                <div>
                    <p  style="margin-left: 10px" class="text-success font-weight-bold">{{session()->get('successComment')}}</p>
                </div>
                 @endif
            </div>
            <form wire:submit.prevent="saveComment">
                <div class="form-group">
                    <textarea wire:model="content" placeholder="say something ..." class="form-control" cols="30"
                              rows="10"></textarea>
                    @error('content')
                        <span class="text-danger font-weight-bold">{{$message}}</span>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary mb-2" value="send">
            </form>
        </div>
    </div>
    <div class="card" style="width: 95%;margin:10px auto">
        <div class="card-header">
            ALl comment belong this articles
        </div>
        <div class="card-body">
            @foreach($article->comments as $comment)
            <div class="comment_user d-flex align-items-center">
                <div>
                    <img src="{{!is_null($comment->user->image) ? asset('images/icon/'.$comment->user->image) : asset('images/defUser.png')}}" alt="" width="50" class="rounded-circle">
                </div>
                <div style="margin-left: 20px;font-weight: bold">
                    <p class="mt-3">{{$comment->user->name}}</p>
                    <p class="text-secondary">{{$comment->content}}</p>
                </div>
                <div style="margin-left: auto">
                    <span>{{$comment->created_at->diffForHumans()}}</span>
                </div>
            </div>
                <hr>
            @endforeach
        </div>
    </div>

</div>
