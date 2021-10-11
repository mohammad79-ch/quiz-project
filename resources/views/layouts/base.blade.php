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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    @livewireStyles

</head>

<body>

<!-- Navigation
================================================== -->

<div class="d-flex justify-content-between" style="padding:50px ;padding:50px;display: flex;background: mediumpurple;">


    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
        </div>
    </div>

@guest
        <div><a class="btn btn-success" href="{{route('register')}}">ورود / ثبت نام</a></div>
        <div><strong>مهمان</strong></div>
    @endguest
    @auth
        <div><a href="{{route('profile',auth()->user()->profile)}}" class="text-white">Name
                : {{auth()->user()->name}}</a></div>
        <div>
            <a href="{{route('discuss')}}" class="text-white">Discuss</a>
            <a href="{{route('admin.dashboard')}}" class="font-weight-bold text-white">Dashboard</a>
            <a href="{{route('articles')}}" class="font-weight-bold text-white">Articles</a>
            <a href="/" class="font-weight-bold text-white">Home</a>
        </div>
    @endauth
</div>
<header class="jumbotron bg-inverse text-xs-center center-vertically" role="banner">
    <div class="container">
        <h1 class="display-3">Land.io, blissful innovation.</h1>
        <h2 class="m-b-3">Craft your journey, <em>absolutely free</em>, with <a href="ui-elements.html"
                                                                                class="jumbolink">Land.io UI kit</a>.
        </h2>
        <a class="btn btn-secondary-outline m-b-1" href="http://tympanus.net/codrops/?p=25217" role="button"><span
                class="icon-sketch"></span>Sketch included</a>
        <ul class="nav nav-inline social-share">
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-twitter"></span> 1024</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-facebook"></span> 562</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-linkedin"></span> 356</a></li>
        </ul>
    </div>
</header>

<!-- Sign Up
================================================== -->
{{$slot}}

<section class="section-signup bg-faded">
    <div class="container">
        <h3 class="text-xs-center m-b-3">Sign up to receive free updates as soon as they hit!</h3>
        <form>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="form-group has-icon-left form-control-name">
                        <label class="sr-only" for="inputName">Your name</label>
                        <input type="text" class="form-control form-control-lg" id="inputName" placeholder="Your name">
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="form-group has-icon-left form-control-email">
                        <label class="sr-only" for="inputEmail">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="inputEmail"
                               placeholder="Email address" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="form-group has-icon-left form-control-password">
                        <label class="sr-only" for="inputPassword">Enter a password</label>
                        <input type="password" class="form-control form-control-lg" id="inputPassword"
                               placeholder="Enter a password" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign up for free!</button>
                    </div>
                </div>
            </div>
            <label class="c-input c-checkbox">
                <input type="checkbox" checked>
                <span class="c-indicator"></span> I agree to Land.io’s <a href="#">terms of service</a>
            </label>
        </form>
    </div>
</section>

<!-- Footer
================================================== -->

<footer class="section-footer bg-inverse" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="media">
                    <div class="media-left">
                        <span class="media-object icon-logo display-1"></span>
                    </div>
                    <small class="media-body media-bottom">
                        &copy; Land.io 2015. <br>
                        Designed by Peter Finlan, developed by Taty Grassini, exclusively for Codrops.
                    </small>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <ul class="nav nav-inline">
                    <li class="nav-item">
                        <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html"
                                            target="_blank">GitHub</a></li>
                    <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span
                                class="icon-caret-up"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/landio.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/regular.min.js" integrity="sha512-4D8biBgqIYSc9UhQlbLb/Mdoajfr6qz5AoWh9NQ1HPryiS415RIh6ErgtavB711Se9DMStLY1KYGvn4lpgIcTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')

</body>
</html>

