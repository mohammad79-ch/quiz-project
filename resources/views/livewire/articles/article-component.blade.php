<div>
    <div class="container p-3">
        <div class="d-flex justify-content-between">
            <div>Filter</div>
            <div>
                <a href="{{route('add.article')}}" class="font-weight-bold">Add new article</a>
            </div>
        </div>
        <div class="articles" style="width: 800px;margin: 0 auto">
            <div class="mt-3 p-5">
                <div class="article_image" style="width: 100%;">
                    <img src="{{asset('images/bg-title-01.jpg')}}" class="rounded" width="100%" height="400px" alt="">
                </div>
                <div class="article_section_details d-flex justify-content-between mt-4">
                    <div><h3 class="font-weight-bold">This is a title</h3>
                    </div>
                    <div class="font-weight-bold">Author : <span class="text-success">Mohammad chenani</span></div>
                </div>
                <div class="article_content p-2 ">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolor fuga officia, quasi quibusdam tempore vero! Consequatur doloribus excepturi, exercitationem, libero molestias perferendis quam quas rem rerum sapiente tenetur velit.</p>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="font-weight-bold btn btn-primary">More... </div>
                    <div></div>
                </div>

            </div>
        </div>
    </div>
</div>
