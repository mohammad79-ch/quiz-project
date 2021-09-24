<div>
    <div class="container p-3">
        @auth
            @if(count($articles))
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong style="margin-right: 10px">Filter</strong>
                        Latest Articles
                        <input type="radio" wire:model="order" style="margin-right: 10px" name="order" value="latest">
                        Oldest Articles
                        <input type="radio" wire:model="order" value="oldest" name="order">
                    </div>
                    <div style="flex: 1;margin: 0 25px">
                        <input type="text" wire:model="search" placeholder="Search in articles" class="form-control">
                    </div>
                    <div>
                        <a href="{{route('add.article')}}" class="font-weight-bold">Add new article</a>
                    </div>
                </div>
                <div class="articles" style="width: 800px;margin: 0 auto">
                    @foreach($articles as $article)
                        <div class="mt-3 p-5">
                            <div class="article_image" style="width: 100%;">
                                <img src="{{asset('storage/articles/'.$article->image)}}" class="rounded" width="100%"
                                     height="400px" alt="">
                            </div>
                            <div class="article_section_details d-flex justify-content-between mt-4">
                                <div><h3 class="font-weight-bold"><a href="" class="text-dark">{{$article->title}}</a>
                                    </h3>
                                </div>
                                <div class="font-weight-bold d-flex flex-column">
                                    <div> Category : <span class="text-primary">
                                            <a href="" wire:click.prevent="findCategories('{{$article->category->name}}')">
                                                {{$article->category->name}}
                                            </a>
                                        </span>
                                    </div>
                                    <div> Author : <span class="text-success">{{$article->user->name}}</span></div>
                                </div>
                            </div>
                            <div class="article_content p-2 ">
                                <p>{{$article->content}}</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="align-items-center  d-flex font-weight-bold ">
                                    <div>
                                        <a href="{{route('single.article',$article->slug)}}"
                                           class="font-weight-bold text-white btn btn-primary">More
                                            ...</a>
                                    </div>
                                    <div style="margin-left: 10px">
                                        @foreach($article->tags as $tag)
                                            <a href=""  wire:click.prevent="findTags('{{$tag->name}}')" class="font-weight-bold ml-3 text-dark">#{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <span class="font-weight-bold">{{$article->created_at->diffForHumans()}}</span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center mt-3 mb-3"><a href="" class="font-weight-bold alert alert-primary">You're not follow anyone yet or your following didn't share articles so far</a></p>
                <div class="text-center">
                    <a href="" class="mt-3 btn btn-warning font-weight-bold">Click here to follow other</a>
                </div>
            @endif
        @endauth
    </div>
</div>
