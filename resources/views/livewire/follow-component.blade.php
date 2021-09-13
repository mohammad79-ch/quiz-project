<div>
    <div class="d-flex justify-content-around mt-3">
            <p>{{$follower}}</p>
        <p>{{$following}}</p>
        <p>5</p>
    </div>

        @if($user->isFollowinBy(auth()->user()))
        <a href="wire" wire:click.prevent="unfollow" class="btn btn-light d-block mb-4 font-weight-bold">  UnFollow    </a>

    @else
        <a href="wire" wire:click.prevent="follow" class="btn btn-light d-block mb-4 font-weight-bold">  Follow    </a>
    @endif
</div>
