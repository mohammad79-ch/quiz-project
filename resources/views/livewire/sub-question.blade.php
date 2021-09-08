<div class="col-md-12 mb-5">
    <h2 class="text-success offset-md-4">{{$question->title}}</h2>
    @foreach($question->subQuestion as $sub)
        @php
        $checkIfExist = [];

        $checkIfExist = $question->users->filter(function ($item){
            return $item->id == auth()->id() && $item->pivot->is_correct == 1 || $item->pivot->is_correct == 0;
        });
        
        @endphp



        <a style="cursor: pointer" @if(!count($checkIfExist)) wire:click.prevent="checkAnswer('{{$sub->id}}')" @endif>
            <div class="col-md-4 justify-content-between d-flex offset-md-4 mt-3 alert alert-secondary  btn-outline-success">
                <div>{{$sub->title}}</div>
                @if(count($checkIfExist) && $sub->is_answer)
                    <div>✓</div>
                @elseif($clicked)
                    <div><strong >&#9888</strong></div>
                @endif
            </div>
        </a>
    @endforeach
</div>
