<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Land.io: Free Landing Page HTML Template | Codrops</title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap"/>
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass"/>
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/favicon/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicon/apple-touch-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/favicon/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/favicon/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicon/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/favicon/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-touch-icon-180x180.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('img/favicon/android-chrome-192x192.png')}}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{asset('img/favicon/favicon-96x96.png')}}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{asset('img/favicon/favicon-16x16.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('img/favicon/manifest.json')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="{{asset('img/favicon/mstile-144x144.png')}}">
    <meta name="msapplication-config" content="{{asset('img/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="{{asset('css/landio.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    @livewireStyles

</head>

<body>

<!-- Navigation
================================================== -->

<div class="d-flex justify-content-between" style="padding:50px ;padding:50px;display: flex;background: mediumpurple;">
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
    <div >
        <div class="col-md-3" style="flex: 1;padding: 20px;border-radius: 10px;background: #2a9055">
            <a href="{{route('discuss.create')}}" class="btn btn-primary btn-block">Create new discuss</a>
        </div>
        <div class="col-md-9" style="border-radius: 10px ">
            @foreach($discusses as $discuss)
            <div class="col-md-12 mt-2" style="flex:1;margin-left: 10px;background: #9fcdff;padding:20px;border-radius: 10px ">
                <div class="d-flex">
                    <div>
                        <img
                            src="{{asset(is_null($discuss->user->image)) ?
                                    asset('images/defUser.png') :
                                     asset('images/icon/'.$discuss->user->image) }}" width="50"
                        >
                    </div>
                    <div style="margin-left: 10px">
                        <h4 class="font-weight-bold" style="font-size: 16px">{{$discuss->user->name}}</h4>
                        <h4 class="font-weight-bold" style="font-size: 16px"><a href="{{route('profile',$discuss->user->profile)}}">{{'@'.$discuss->user->profile}}</a></h4>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h3><a href="{{route('discuss.show',$discuss->id)}}" class="font-weight-bold">{{$discuss->title}}</a></h3>
                    <p>{{$discuss->created_at->diffForHumans()}}</p>
                </div>
                <div class="card-body">
                    <p>{{$discuss->content}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="btn btn-light"> replay {{count($discuss->child)}}</a>
                    </div>

                    <div>
                        @foreach($discuss->tags as $tag)
                        <a class="font-weight-bold">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
                <hr>
        </div>
    </div>
</div>

@include('layouts.footer')
