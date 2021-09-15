<div>
    <div class="container p-3">
        <div class="d-flex justify-content-between">
            <div>Filter</div>
            <div>
                <a href="{{route('add.article')}}" class="font-weight-bold">Add new article</a>
            </div>
        </div>
        <div class="articles" style="width: 800px;margin: 0 auto">
            @foreach($articles as $article)
            <div class="mt-3 p-5">
                <div class="article_image" style="width: 100%;">
                    <img src="{{asset('storage/articles/'.$article->image)}}" class="rounded" width="100%" height="400px" alt="">
                </div>
                <div class="article_section_details d-flex justify-content-between mt-4">
                    <div><h3 class="font-weight-bold"><a href="" class="text-dark">{{$article->title}}</a></h3>
                    </div>
                    <div class="font-weight-bold"> Author : <span class="text-success">{{$article->user->name}}</span></div>
                </div>
                <div class="article_content p-2 ">
                    <p>{{$article->content}}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="font-weight-bold btn btn-primary">More... </div>
                    <div>
                       <span class="font-weight-bold">{{$article->created_at->diffForHumans()}}</span>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
