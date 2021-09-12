@extends('layouts.app')

@section('section')
    <!-- Intro
================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex mt-3">
                    @foreach($images as $image)
                    <div class="ml-2"style="margin-left: 5px">
                        <img src="{{asset('storage/UserStory/'.$image->url)}}" width="50" class="rounded-circle border" alt="">
                        <p>{{$image->user->prfile}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
                <div class="col-12">
                    <form action="{{route('user.images',['profile'=>auth()->user()->profile])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex offset-4 mt-3">
                            <input type="file" class="form-control-file" name="url">
                            <input type="submit" value="publish" class="btn btn-success">
                        </div>
                    </form>
                </div>
        </div>
        <div class="row mt-3">
            <div class="alert  alert-primary col-md-4 mr-2">
                <h4 class="mb-5">10 top users to answer the questions</h4>
                            @foreach($users as $user)

                            <div class="col-12 d-flex justify-content-between" style="height: auto">
                                 <div><span class="font-weight-bold">
                                         <span class="font-weight-bold" >{{$user['name']}}</span>
                                     </span></div>
                                <div>
                                    <a href="{{route('profile',['profile'=>$user['profile']])}}">See Profile</a>
                                </div>
                              </div>
                                <hr>
                            @endforeach
                        {{$users->links()}}
                    </div>
            <div class="alert alert-primary col-md-7 offset-1 "><p class="mb-2 font-weight-bold">Question</p>
                @auth
                    @foreach($questions as $question)
                        @livewire('sub-question',['question'=>$question])
                    @endforeach
                @endauth

                @guest
                    <a href="{{route('register')}}" class="btn btn-warning"> At first Login/Register in website</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Features
    ================================================== -->

    <section class="section-features text-xs-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                            <span class="icon-pen display-1"></span>
                            <h4 class="card-title">250</h4>
                            <h6 class="card-subtitle text-muted">UI Elements</h6>
                            <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu
                                adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-block">
                            <span class="icon-thunderbolt display-1"></span>
                            <h4 class="card-title">Ultra</h4>
                            <h6 class="card-subtitle text-muted">Modern design</h6>
                            <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu
                                adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card m-b-0">
                        <div class="card-block">
                            <span class="icon-heart display-1"></span>
                            <h4 class="card-title">Free</h4>
                            <h6 class="card-subtitle text-muted">Forever and ever</h6>
                            <p class="card-text">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl cras eu
                                adipiscing ac cras at sem cras per senectus eu parturient quam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video
    ================================================== -->

    <section class="section-video bg-inverse text-xs-center wp wp-4">
        <h3 class="sr-only">Video</h3>
        <video id="demo_video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               poster="img/video-poster.jpg" data-setup='{}'>
            <source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>
            <source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>
        </video>
    </section>

    <!-- Pricing
    ================================================== -->

    <section class="section-pricing bg-faded text-xs-center">
        <div class="container">
            <h3>Manage your subscriptions</h3>
            <div class="row p-y-3">
                <div class="col-md-4 p-t-md wp wp-5">
                    <div class="card pricing-box">
                        <div class="card-header text-uppercase">
                            Personal
                        </div>
                        <div class="card-block">
                            <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl
                                cras.</p>
                            <h4 class="card-text">
                                <sup class="pricing-box-currency">$</sup>
                                <span class="pricing-box-price">19</span>
                                <small class="text-muted text-uppercase">/month</small>
                            </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                            <li class="list-group-item">Sed risus feugiat</li>
                            <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                            <li class="list-group-item">Sed risus feugiat fusce</li>
                        </ul>
                        <a href="#" class="btn btn-primary-outline">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 stacking-top">
                    <div class="card pricing-box pricing-best p-x-0">
                        <div class="card-header text-uppercase">
                            Professional
                        </div>
                        <div class="card-block">
                            <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl
                                cras.</p>
                            <h4 class="card-text">
                                <sup class="pricing-box-currency">$</sup>
                                <span class="pricing-box-price">49</span>
                                <small class="text-muted text-uppercase">/month</small>
                            </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                            <li class="list-group-item">Sed risus feugiat</li>
                            <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                            <li class="list-group-item">Sed risus feugiat fusce</li>
                            <li class="list-group-item">Sed risus feugiat</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 p-t-md wp wp-6">
                    <div class="card pricing-box">
                        <div class="card-header text-uppercase">
                            Enterprise
                        </div>
                        <div class="card-block">
                            <p class="card-title">Sed risus feugiat fusce eu sit conubia venenatis aliquet nisl
                                cras.</p>
                            <h4 class="card-text">
                                <sup class="pricing-box-currency">$</sup>
                                <span class="pricing-box-price">99</span>
                                <small class="text-muted text-uppercase">/month</small>
                            </h4>
                        </div>
                        <ul class="list-group list-group-flush p-x">
                            <li class="list-group-item">Sed risus feugiat</li>
                            <li class="list-group-item">Sed risus feugiat fusce eu sit</li>
                            <li class="list-group-item">Sed risus feugiat fusce</li>
                        </ul>
                        <a href="#" class="btn btn-primary-outline">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials
    ================================================== -->

    <section class="section-testimonials text-xs-center bg-inverse">
        <div class="container">
            <h3 class="sr-only">Testimonials</h3>
            <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <img src="img/face1.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                            <p class="h3">Good design at the front-end suggests that everything is in order at the
                                back-end, whether or not that is the case.</p>
                            <footer>Dmitry Fadeyev</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <img src="img/face2.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                            <p class="h3">It’s not about knowing all the gimmicks and photo tricks. If you haven’t got
                                the eye, no program will give it to you.</p>
                            <footer>David Carson</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <img src="img/face3.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                            <p class="h3">There’s a point when you’re done simplifying. Otherwise, things get really
                                complicated.</p>
                            <footer>Frank Chimero</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <img src="img/face4.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                            <p class="h3">Designing for clients that don’t appreciate the value of design is like buying
                                new tires for a rental car.</p>
                            <footer>Joel Fisher</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <img src="img/face5.jpg" height="80" width="80" alt="Avatar" class="img-circle">
                            <p class="h3">Every picture owes more to other pictures painted before than it owes to
                                nature.</p>
                            <footer>E.H. Gombrich</footer>
                        </blockquote>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li class="active"><img src="img/face1.jpg" alt="Navigation avatar"
                                            data-target="#carousel-testimonials" data-slide-to="0"
                                            class="img-fluid img-circle"></li>
                    <li><img src="img/face2.jpg" alt="Navigation avatar" data-target="#carousel-testimonials"
                             data-slide-to="1" class="img-fluid img-circle"></li>
                    <li><img src="img/face3.jpg" alt="Navigation avatar" data-target="#carousel-testimonials"
                             data-slide-to="2" class="img-fluid img-circle"></li>
                    <li><img src="img/face4.jpg" alt="Navigation avatar" data-target="#carousel-testimonials"
                             data-slide-to="3" class="img-fluid img-circle"></li>
                    <li><img src="img/face5.jpg" alt="Navigation avatar" data-target="#carousel-testimonials"
                             data-slide-to="4" class="img-fluid img-circle"></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Text Content
    ================================================== -->

    <section class="section-text">
        <div class="container">
            <h3 class="text-xs-center">Make your mark on the product industry</h3>
            <div class="row p-y-3">
                <div class="col-md-5">
                    <p class="wp wp-7">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci
                        parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem.
                        Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus
                        consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
                </div>
                <div class="col-md-5 col-md-offset-2 separator-x">
                    <p class="wp wp-8">A posuere donec senectus suspendisse bibendum magna ridiculus a justo orci
                        parturient suspendisse ad rhoncus cursus ut parturient viverra elit aliquam ultrices est sem.
                        Tellus nam ad fermentum ac enim est duis facilisis congue a lacus adipiscing consequat risus
                        consectetur scelerisque integer suspendisse a mus integer elit massa ut.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News
    ================================================== -->

    <section class="section-news">
        <div class="container">
            <h3 class="sr-only">News</h3>
            <div class="bg-inverse">
                <div class="row">
                    <div class="col-md-6 p-r-0">
                        <figure class="has-light-mask m-b-0 image-effect">
                            <img
                                src="https://images.unsplash.com/photo-1442328166075-47fe7153c128?q=80&fm=jpg&w=1080&fit=max"
                                alt="Article thumbnail" class="img-fluid">
                        </figure>
                    </div>
                    <div class="col-md-6 p-l-0">
                        <article class="center-block">
                            <span class="label label-info">Featured article</span>
                            <br>
                            <h5><a href="#">Design studio with product designer Peter Finlan <span
                                        class="icon-arrow-right"></span></a></h5>
                            <p class="m-b-0">
                                <a href="#"><span class="label label-default text-uppercase"><span
                                            class="icon-tag"></span> Design Studio</span></a>
                                <a href="#"><span class="label label-default text-uppercase"><span
                                            class="icon-time"></span> 1 Hour Ago</span></a>
                            </p>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-push-6 p-l-0">
                        <figure class="has-light-mask m-b-0 image-effect">
                            <img
                                src="https://images.unsplash.com/photo-1434394673726-e8232a5903b4?q=80&fm=jpg&w=1080&fit=max"
                                alt="Article thumbnail" class="img-fluid">
                        </figure>
                    </div>
                    <div class="col-md-6 col-md-pull-6 p-r-0">
                        <article class="center-block">
                            <span class="label label-info">Featured article</span>
                            <br>
                            <h5><a href="#">How bold, emotive imagery can connect with your audience <span
                                        class="icon-arrow-right"></span></a></h5>
                            <p class="m-b-0">
                                <a href="#"><span class="label label-default text-uppercase"><span
                                            class="icon-tag"></span> Design Studio</span></a>
                                <a href="#"><span class="label label-default text-uppercase"><span
                                            class="icon-time"></span> 1 Hour Ago</span></a>
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
