<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Land.io: Free Landing Page HTML Template | Codrops</title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="shortcut icon" href="img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="css/landio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    @livewireStyles

</head>

<body>

<!-- Navigation
================================================== -->

{{--<nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="#">--}}
{{--            <span class="icon-logo"></span>--}}
{{--            <span class="sr-only">Land.io</span>--}}
{{--        </a>--}}
{{--        <a class="navbar-toggler hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">--}}
{{--            &#9776;--}}
{{--        </a>--}}
{{--        <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingMobileUser" aria-expanded="false" aria-controls="collapsingMobileUser">--}}
{{--            <span class="icon-user"></span>--}}
{{--        </a>--}}
{{--        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">--}}
{{--            <ul class="nav navbar-nav pull-xs-right">--}}
{{--                <li class="nav-item nav-item-toggable">--}}
{{--                    <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item nav-item-toggable">--}}
{{--                    <a class="nav-link" href="ui-elements.html">UI Kit</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item nav-item-toggable">--}}
{{--                    <a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item nav-item-toggable hidden-md-up">--}}
{{--                    <form class="navbar-form">--}}
{{--                        <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                <li class="navbar-divider hidden-sm-down"></li>--}}
{{--                <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">--}}
{{--                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <span class="icon-search"></span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">--}}
{{--                        <form class="navbar-form">--}}
{{--                            <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item dropdown hidden-sm-down textselect-off">--}}
{{--                    <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <img src="img/face5.jpg" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenu2">--}}
{{--                        <div class="media">--}}
{{--                            <div class="media-left">--}}
{{--                                <img src="img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">--}}
{{--                            </div>--}}
{{--                            <div class="media-body media-middle">--}}
{{--                                <h5 class="media-heading">Joel Fisher</h5>--}}
{{--                                <h6>hey@joelfisher.com</h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="dropdown-item text-uppercase">View posts</a>--}}
{{--                        <a href="#" class="dropdown-item text-uppercase">Manage groups</a>--}}
{{--                        <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>--}}
{{--                        <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>--}}
{{--                        <a href="#" class="btn-circle has-gradient pull-xs-right">--}}
{{--                            <span class="sr-only">Edit</span>--}}
{{--                            <span class="icon-edit"></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div id="collapsingMobileUser" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUser">--}}
{{--            <div class="media m-t-1">--}}
{{--                <div class="media-left">--}}
{{--                    <img src="img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">--}}
{{--                </div>--}}
{{--                <div class="media-body media-middle">--}}
{{--                    <h5 class="media-heading">Joel Fisher</h5>--}}
{{--                    <h6>hey@joelfisher.com</h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a href="#" class="dropdown-item text-uppercase">View posts</a>--}}
{{--            <a href="#" class="dropdown-item text-uppercase">Manage groups</a>--}}
{{--            <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>--}}
{{--            <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>--}}
{{--            <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">--}}
{{--                <span class="sr-only">Edit</span>--}}
{{--                <span class="icon-edit"></span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<!-- Hero Section
================================================== -->

       <div class="d-flex justify-content-between" style="padding:50px ;padding:50px;display: flex;background: mediumpurple;">
           @guest
           <div><a class="btn btn-success" href="{{route('register')}}" >ورود / ثبت نام</a></div>
               <div><strong>مهمان</strong></div>
            @endguest
           @auth
           <div><a href="" class="text-white">Name : {{auth()->user()->name}}</a></div>
           <div><a href="{{route('admin.dashboard')}}" class="text-white">Dashboard</a></div>
            @endauth
       </div>
<header class="jumbotron bg-inverse text-xs-center center-vertically" role="banner">
    <div class="container">
        <h1 class="display-3">Land.io, blissful innovation.</h1>
        <h2 class="m-b-3">Craft your journey, <em>absolutely free</em>, with <a href="ui-elements.html" class="jumbolink">Land.io UI kit</a>.</h2>
        <a class="btn btn-secondary-outline m-b-1" href="http://tympanus.net/codrops/?p=25217" role="button"><span class="icon-sketch"></span>Sketch included</a>
        <ul class="nav nav-inline social-share">
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-twitter"></span> 1024</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-facebook"></span> 562</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span class="icon-linkedin"></span> 356</a></li>
        </ul>
    </div>
</header>
