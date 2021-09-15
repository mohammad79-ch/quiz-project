<div>

    <style>
        #followers,#following {
            display: none;
        }

    </style>

    <div class="d-flex justify-content-around mt-3">
        <p style="font-size: 14px;font-weight: bold;margin: 3px">followers</p>
        <p style="font-size: 14px;font-weight: bold;margin: 3px">following</p>
        <p style="font-size: 14px;font-weight: bold;margin: 3px">posts</p>
    </div>
    <div class="d-flex justify-content-around mt-3">
            <a id="followerCount">{{$followerCount}}</a>
        <a id="followingCount">{{$followingCount}}</a>
        <p>5</p>
    </div>
        @auth
            @if(auth()->user()->id != $user->id )
            @if($isFollowinBy)
                <a href="" wire:click.prevent="unfollow" class="btn btn-light d-block mb-4 font-weight-bold">  UnFollow    </a>

            @else
                <a href="" wire:click.prevent="follow" class="btn btn-light d-block mb-4 font-weight-bold">  Follow    </a>
            @endif
        @endif
        @endauth

    <div class="bg-light" id="followers" >
         <span class="font-weight-bold">Followers</span>
        <ul>
            @forelse($followers as $follower)
                <li>{{$follower->name}}</li>
                @empty
                 <li>No follower</li>
            @endforelse
        </ul>
    </div>
    <div class="bg-light" id="following">
        <span class="font-weight-bold">Following</span>
        <ul>
            @forelse($followings as $following)
                <li>{{$following->name}}</li>
                @empty
                    <li>No Following</li>
            @endforelse
        </ul>
    </div>
</div>
@section('script')

    <script>
        $(document).ready(function (){
            $("#followerCount").click(function (){
                $("#followers").slideToggle(200);
            });
            $("#followingCount").click(function (){
                $("#following").slideToggle(200);
            })
        })
    </script>
@endsection
