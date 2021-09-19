<div>
   <div class="m-3 mt-4 mb-4">
       <h3 class="font-weight-bold ">{{$article->title}}</h3>
   </div>
    <div class="d-flex mt-3 mb-3 p-2" style="width:98%;margin:0 auto;">
        <div style="flex: 1;border: 1px solid #ccc;border-radius: 7px;height:400px;">show 5 Similar  articles</div>

        <div style="flex:2.75;border: 1px solid #ccc;border-radius:8px;margin-left:9px">
            <div class="articles">
                <div class="p-2">
                    <div class="article_image" style="width: 100%;">
                        <img src="{{asset('storage/articles/'.$article->image)}}" class="rounded" width="100%" height="400px" alt="">
                    </div>
                    <div class="article_section_details d-flex justify-content-between mt-2">
                        <div><h3 class="font-weight-bold"><a href="" class="text-dark">{{$article->title}}</a></h3>
                        </div>
                    </div>
                    <div class="article_content p-2 ">
                        <p>{{$article->content}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dignissimos enim eveniet ex excepturi in labore, laborum molestias neque pariatur perspiciatis possimus, praesentium provident quaerat ratione repellendus rerum temporibus tenetur.</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold ml-2"> Author : <span class="text-success">{{$article->user->name}}</span></div>
                        {{--                       <div ><a href="{{route('single.article',$article->id)}}" class="font-weight-bold btn btn-primary">More... </a></div>--}}
                        <div>
                            <span class="font-weight-bold">{{$article->created_at->diffForHumans()}}</span>
                            {{--                           <span class=" mr-2"><a href="{{route('edit.article',$article)}}" class="font-weight-bold text-warning">Edit</a></span>--}}
                        </div>
                    </div>

                </div>
            </div>

            <hr>
            @livewire('comment-component',['article'=>$article])
        </div>
    </div>
</div>
