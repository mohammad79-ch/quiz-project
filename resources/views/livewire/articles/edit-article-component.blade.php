<div>

    <div style="padding: 10px;width:800px;margin:30px auto;border: 1px solid #ccc;border-radius: 7px">
        <div class="mb-3 font-weight-bold">
            Add Article
        </div>
        <div>
            @if(session('editArticle'))
                <div>
                    <p class="text-success font-weight-bold">{{session('editArticle')}}</p>
                </div>
            @endif
            <form wire:submit.prevent="editArticle">
                <div class="form-group">
                    <input class="form-control" type="text" wire:model="title" value="{{old('title',$title)}}" placeholder="title">
                    @error('title')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea wire:model="content" class="form-control"  placeholder="Content">{{$content}}</textarea>
                    @error('content')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="mb-2 text-center">
                        <img src="{{asset('storage/articles/'.$image)}}" class="rounded" width="150" alt="">
                    </div>
                    <input class="form-control" type="file" wire:model="newImage">
                    @error('newImage')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <select wire:model="status" class="form-control">
                        <option value="0" @if($status == 0) {{'selected'}} @endif>onPublish</option>
                        <option value="1" @if($status == 1) {{'selected'}} @endif>Publish</option>
                    </select>
                    @error('status')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <input type="submit" value="Edit Article" class="btn btn-warning btn-block">
            </form>
        </div>
    </div>

</div>
