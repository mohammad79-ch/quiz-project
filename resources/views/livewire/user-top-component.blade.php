<div>
    <style>
        svg {
            width: 24px;
        }
    </style>
    @foreach($users as $key => $user)
        <div class="col-12 d-flex justify-content-between" style="height: auto">
            <div class="d-flex">
                @if($loop->iteration == 1)
                    <p  class="medal text-center text-white bg-warning">{{$loop->iteration}}</p>
                @elseif($loop->iteration == 2)
                    <p class=" medal text-center text-white bg-secondary">{{$loop->iteration}}</p>
                @elseif($loop->iteration == 3)
                    <p class="medal text-center text-white bg-danger">{{$loop->iteration}}</p>
                @endif
                <span class="font-weight-bold">{{$user['name']}}</span>
            </div>
            <div>
                <a href="{{route('profile',['profile'=>$user['profile']])}}">See Profile</a>
            </div>
        </div>
        <hr>
    @endforeach
        {{$users->links()}}

</div>
