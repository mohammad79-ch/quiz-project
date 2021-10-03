<div>

    @if(count($discuss->likes->where('user_id',auth()->user()->id)->all()))
        <a>
            <i wire:click.prevent="unLike" class="fas fa-heart" style="font-size:22px"></i>
        </a>
        {{$countLike}}
    @else
        <a >
            <i wire:click.prevent="like" class="far fa-heart" style="font-size:22px"></i>
        </a>
            {{$countLike}}
    @endif




</div>
