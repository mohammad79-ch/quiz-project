@include('layouts.headertemp')
<body>

<!-- Navigation
================================================== -->

<div class="d-flex justify-content-between" style="padding:50px ;padding:50px;display: flex;background: mediumpurple;">

    @auth
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            @foreach(auth()->user()->notifications as $notification)
                <a class="dropdown-item" href="#">{{$notification->data['message']}}</a>
            @endforeach


        </div>
    @endauth
    @guest
        <div><a class="btn btn-success" href="{{route('register')}}">ورود / ثبت نام</a></div>
        <div><strong>مهمان</strong></div>
    @endguest
    @auth
        <div><a href="{{route('profile',auth()->user()->profile)}}" class="text-white">Name
                : {{auth()->user()->name}}</a></div>

        <div>
            <a href="{{route('discuss')}}" class="text-white">Discuss</a>
            <a href="{{route('admin.dashboard')}}" class="text-white">Dashboard</a>
            <a href="{{route('articles')}}" class="font-weight-bold text-white">Articles</a>
            <a href="/" class="font-weight-bold text-white">Home</a>
        </div>
    @endauth
</div>

<div class="row" style="width:99%;margin: 10px auto">
    <div>
        <div class="col-md-3" style="flex: 1;padding: 20px;border-radius: 10px;background: #2a9055">
            <a href="" class="btn btn-primary btn-block">Filters</a>
        </div>
        <div class="col-md-9" style="border-radius: 10px ">
            {!! $media !!}

            <a d>{{url()->current()}}</a><a style="cursor: pointer" onclick="copyToClipboard('{{url()->current()}}')" class="btn btn-secondary btn-sm">copy</a>
            <div class="d-flex bg-light" style="margin-left: 10px !important">
                <div class="m-2">
                    <img
                        src="{{asset(is_null($discuss->user->image)) ?
                                    asset('images/defUser.png') :
                                     asset('images/icon/'.$discuss->user->image) }}" width="50"
                    >
                </div>
                <div class="mt-3">
                    <h3>{{$discuss->title}}</h3>
                </div>
            </div>
            <div class="col-md-12"
                 style="flex:1;margin-left: 10px;background: #9fcdff;padding:20px;border-radius: 10px ">
                <div class="card-body d-flex justify-content-between">
                    <p>{{$discuss->content}} </p>
                    @auth

                        @if(!count($is_subscriptions))
                        <form action="{{route('discuss.subscriptions',$discuss)}}" method="post">
                            @csrf
                            <button style="background: none;outline: none" type="submit"><i class="far fa-bell" style="font-size: 20px"></i></button>
                        </form>
                        @else
                        <form action="{{route('discuss.subscriptions.remove',$discuss)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button style="background: none;outline: none" type="submit"><i class="fas fa-bell" style="font-size: 20px"></i></button>
                        </form>
                        @endif

                    @endauth
                    @livewire('vote.vote-component',['discuss'=>$discuss])

                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <p>{{$discuss->created_at->diffForHumans()}}</p>
                    </div>
                    <div>
                        <a href="">web</a>
                        <a href="">programmer</a>
                        <a href="">bug</a>
                    </div>
                </div>
            </div>
            <hr>
            @foreach($discuss->child as $disChilds)
                <div class="col-md-12 mt-3"
                     style="flex:1;margin-left: 10px;background: #9fcdff;padding:20px;border-radius: 10px ">
                    <div class="d-flex">
                        <div>
                            <img
                                src="{{asset(is_null($disChilds->user->image)) ?
                                    asset('images/defUser.png') :
                                     asset('images/icon/'.$disChilds->user->image) }}" width="50"
                            >
                        </div>
                        <div style="margin-left: 10px">
                            <h4 class="font-weight-bold" style="font-size: 16px">{{$disChilds->user->name}}</h4>
                            <h4 class="font-weight-bold" style="font-size: 16px"><a
                                    href="{{route('profile',$disChilds->user->profile)}}">{{'@'.$disChilds->user->profile}}</a>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p class="font-weight-bold">{{$disChilds->content}}<p>
                        <div class="d-flex flex-column">
                            @livewire('vote.vote-component',['discuss'=>$disChilds])
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        @livewire('like.like-component',['discuss' => $disChilds])

                        <p>{{$disChilds->created_at->diffForHumans()}}</p>
                        @if($discuss->is_answer)
                            @if($disChilds->is_answer == $discuss->id)
                                <p><a class="btn btn-success">bestAnswer</a></p>
                            @endif
                        @else
                            <p><a
                                    href="{{route('bestAnswer',['discuss'=>$discuss,'cuurentDiscuss'=>$disChilds])}}"
                                    class="btn btn-secondary">
                                    BestAnswer
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
            @auth
                <div class="col-md-12" style="border-radius: 10px ">
                    <div class="col-md-12 mt-3"
                         style="flex:1;margin-left: 10px;background: #9fcdff;padding:20px;border-radius: 10px ">
                        <form action="{{route('discuss.replay',$discuss->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
                                @error('content')
                                <span class="font-weight-bold text-danger"> {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@include('layouts.footer')
