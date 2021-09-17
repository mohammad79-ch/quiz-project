<div>
    <div class="container">
    <div class="d-flex mt-3">
        <div style="flex: 1">
            <div class="card p-3">
                <div class="card-header">
                    All Details Blong to {{$user->name}}
                </div>
                <hr>
                <div class="card-body">
                        <div class="text-center mt-3">
                            <img src="{{!is_null($user->image) ? asset('userImg/'.$user->image) : asset('images/defUser.png')}}" width="50" alt="">
                        </div>

                        @livewire('follow-component',['user'=>$user])


                    <div class="d-flex justify-content-between">
                        <div><p style="font-size: 12px">All Answer</p></div>
                        <div><p class="bg-warning text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">{{$totalAnswer}}</p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><p style="font-size: 12px">Correct Answer</p></div>
                        <div><p class="bg-success text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                {{$correctAnswer}}
                            </p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><p style="font-size: 12px">Wrong Answer</p></div>
                        <div><p class="bg-danger text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                {{$wrongAnswer}}
                            </p></div>
                    </div>

                </div>
            </div>
        </div>
        <div style="flex:3;margin-left: 15px" >
            <div class="card  p-3">
                <div class="card-header">
                    Content
                </div>
                <hr>
            </div>
            <div class="card-body mt-2">
                <div class="articles">
                    @foreach($user->articles as $article)
                        <div class="p-2">
                            <div class="article_image" style="width: 100%;">
                                <img src="{{asset('storage/articles/'.$article->image)}}" class="rounded" width="100%" height="400px" alt="">
                            </div>
                            <div class="article_section_details d-flex justify-content-between mt-2">
                                <div><h3 class="font-weight-bold"><a href="" class="text-dark">{{$article->title}}</a></h3>
                                </div>
                                <div class="font-weight-bold pt-2"> Author : <span class="text-success">{{$article->user->name}}</span></div>
                            </div>
                            <div class="article_content p-2 ">
                                <p>{{$article->content}}</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div ><a href="{{route('single.article',$article->id)}}" class="font-weight-bold btn btn-primary">More... </a></div>
                                <div>
                                    <span class="font-weight-bold">{{$article->created_at->diffForHumans()}}</span>
                                    <span class=" mr-2"><a href="{{route('edit.article',$article->slug)}}" class="font-weight-bold text-warning">Edit</a></span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="flex:1;margin-left: 15px">
            <div class="card  p-3">
                <div class="card-header">
                    AboutMe
                </div>
                <hr>
                <div class="card-body">
                    <p>{{$user->aboutMe}}</p>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
