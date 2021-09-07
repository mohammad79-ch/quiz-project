<div class="col-md-12 mb-5">
    <h2 class="text-success offset-md-4">{{$question->title}}</h2>
    @foreach($question->subQuestion as $sub)
        <a href="#" wire:click.prevent="checkAnswer('{{$sub->id}}')">
            <div class="col-md-4 justify-content-between d-flex offset-md-4 mt-3 alert alert-secondary  btn-outline-success">
                <div>{{$sub->title}}</div>
                @if(!is_null($sub->users()->where('user_id',auth()->id())->first()) && $sub->is_answer)
                    <div>✓</div>
                @elseif($clicked)
                    <div><strong >&#9888</strong></div>
                @endif
            </div>
        </a>
    @endforeach
</div>
