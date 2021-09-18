<div>
    <div style="padding: 10px;width:800px;margin:30px auto;border: 1px solid #ccc;border-radius: 7px">
        <div class="mb-3 d-flex font-weight-bold justify-content-between">
            <div> Add Article</div>
            <div>
                <a href="/articles">All articles</a>
            </div>
        </div>
        <div>
            @if(session('createArticle'))
                <div>
                    <p class="text-success font-weight-bold">{{session('createArticle')}}</p>
                </div>
            @endif
            <form wire:submit.prevent="createArticle">
                <div class="form-group">
                    <input class="form-control" type="text" wire:model="title" placeholder="title">
                    @error('title')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" wire:model="slug" placeholder="slug">
                    @error('slug')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea wire:model="content" class="form-control" placeholder="Content"></textarea>
                    @error('content')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="category_id" class="form-control">
                       @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('content')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <input class="form-control" type="file" wire:model="image">
                    @error('file')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="status" class="form-control">
                        <option value="1">Publish</option>
                        <option value="0">onPublish</option>
                    </select>
                </div>
                <input type="submit" value="create Article" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
</div>
