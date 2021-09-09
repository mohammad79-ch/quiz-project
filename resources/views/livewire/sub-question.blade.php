<div class="col-md-12 mb-5">
    <h3 style="font-size: 16px" class="text-success offset-md-4">{{$question->title}}</h3>
    <div class="d-flex col-4 offset-md-4 mt-4 justify-content-around">
        @if(!$selectEasy && !$selectHard)
            <div><span style="border-radius: 15px" class="bg-danger p-2 mt-3">Level</span>
                <input type="radio" name="level" wire:model="level" value="easy"> easy
                <input type="radio" name="level" wire:model="level" value="hard"> hard
            </div>
        @endif
        <div class="ml-2"><span style="border-radius: 15px" class="bg-warning p-2 ">Rate</span>

            @php
                $selectHardForRate = $question->users->filter(function ($item){
                     return $item->pivot->select_level == 2;
                     });
                $selectEasyForRate = $question->users->filter(function ($item){
                     return $item->pivot->select_level == 1;
                });

            if ($selectEasyForRate > $selectHardForRate){
               echo "<span style='border-radius: 15px;' class=\"bg-success p-2 \"> Easy </span>";
            }else{
                echo "<span style='border-radius: 15px;' class=\"bg-danger p-2 \"> Hard </span>";
            }
            @endphp
        </div>
    </div>
    @foreach($question->subQuestion as $sub)
        @php

            $checkIfExist = [];

            $checkIfExist = $question->users->filter(function ($item){
                return $item->id == auth()->id() && !is_null($item->pivot->is_correct);
            });

        @endphp

        <a style="cursor: pointer" @if(!$checkQuestion) wire:click.prevent="checkAnswer('{{$sub->id}}')" @endif>
            <div
                class="col-md-4 justify-content-between d-flex offset-md-4 mt-3 alert alert-secondary  btn-outline-success">
                <div>{{$sub->title}}</div>
                @if($checkQuestion && $sub->is_answer)
                    <div>✓</div>
                @elseif($checkQuestion &&  !$sub->answer)
                    <div><strong>&#9888</strong></div>
                @endif
            </div>
        </a>
    @endforeach
</div>
