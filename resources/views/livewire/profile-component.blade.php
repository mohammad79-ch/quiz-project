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
                            <img
                                src="{{!is_null($user->image) ? asset('userImg/'.$user->image) : asset('images/defUser.png')}}"
                                width="50" alt="">
                        </div>
                        @livewire('follow-component',['user'=>$user])


                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">All Answer</p></div>
                            <div><p class="bg-warning text-center"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">{{$totalAnswer}}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">Correct Answer</p></div>
                            <div><p class="bg-success text-center"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                    {{$correctAnswer}}
                                </p></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">Wrong Answer</p></div>
                            <div><p class="bg-danger text-center"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                    {{$wrongAnswer}}
                                </p></div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">All Discusses</p></div>
                            <div><p class="bg-secondary text-center text-white"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                    {{$user->discuss->where('parent_id',0)->count()}}
                                </p></div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">All Answer To Discusses</p></div>
                            <div><p class="bg-warning text-center"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">{{$user->discuss->where('parent_id','!=',0)->count()}}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">Best replay Discuss</p></div>
                            <div><p class="bg-success text-center text-white"
                                    style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                    {{$user->discuss->where('is_answer','>',1)->count()}}
                                </p></div>
                        </div>

                    </div>
                </div>
            </div>
            <div style="flex:3;margin-left: 15px">
                <div class="card  p-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5><a href="{{route('profile',$user->profile)}}/articles" class="font-weight-bold">Articles</a></h5>
                        <h5><a href='{{route('profile',$user->profile)}}/discusses' class="font-weight-bold">Discusses</a></h5>
                    </div>
                    <hr>
                </div>
                <div class="card-body mt-2">
                    @if(request()->segment(count(request()->segments())) == "discusses")
                        <div class="discusses">
                          @foreach($user->discuss->where('parent_id',0)->all() as $discuss)
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
                                    <div style="margin-left: auto;font-weight: bold">
                                        @php
                                            $idLastUserReplay = $discuss->child->pluck('id')->max();
                                             $discuss_detail = $discuss->child->firstWhere('id',$idLastUserReplay);
                                        @endphp
                                        @if(!is_null($discuss_detail))
                                            replay by <span><a href="{{route('profile',$discuss_detail->user->profile)}}"
                                                               class="text-danger font-weight-bold">
                                    {{$discuss_detail->user->name}}
                                    </a></span>
                                        @else
                                            posted by <span><a href="{{route('profile',$discuss->user->profile)}}" class="text-danger font-weight-bold">{{$discuss->user->name}}</a></span>
                                        @endif

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
                                        @if($discuss->is_answer)
                                            <a href="" class="btn btn-warning">solved</a>
                                        @endif
                                    </div>

                                    <div>
                                        @foreach($discuss->tags as $tag)
                                            <a class="font-weight-bold">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                    <div class="articles">
                        <h3>Artilces</h3>
                        @foreach($user->articles as $article)
                            <div class="p-2">
                                <div class="article_image" style="width: 100%;">
                                    <img src="{{asset('storage/articles/'.$article->image)}}" class="rounded"
                                         width="100%" height="400px" alt="">
                                </div>
                                <div class="article_section_details d-flex justify-content-between mt-2">
                                    <div><h3 class="font-weight-bold"><a href=""
                                                                         class="text-dark">{{$article->title}}</a></h3>
                                    </div>
                                    <div class="font-weight-bold d-flex flex-column">
                                        <div> Category : <span class="text-primary">{{$article->category->name}}</span>
                                        </div>
                                        <div> Author : <span class="text-success ">{{$article->user->name}}</span></div>
                                    </div>
                                </div>
                                <div class="article_content p-2 ">
                                    <p>{{$article->content}}</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div><a href="{{route('single.article',$article->slug)}}"
                                            class="font-weight-bold btn btn-primary">More... </a></div>
                                    <div>
                                        <span class="font-weight-bold">{{$article->created_at->diffForHumans()}}</span>
                                        @can('delete',$article)
                                            <span class=" mr-2"><a href="{{route('edit.article',$article->slug)}}"
                                                                   class="font-weight-bold text-warning">Edit</a></span>
                                            <span class=" mr-2"><a href=""
                                                                   wire:click.prevent="deleteArticle('{{$article->slug}}')"
                                                                   class="font-weight-bold text-danger">del</a></span>
                                        @endcan
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    @endif
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
