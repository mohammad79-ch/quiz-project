@include('layouts.headertemp')
<body>

<!-- Navigation
================================================== -->

<div class="d-flex justify-content-between" style="padding:50px ;padding:50px;display: flex;background: mediumpurple;">

    @auth
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            @foreach(auth()->user()->notifications as $notification)
                <a class="dropdown-item" href="#">{{$notification->data['message']}}</a>
            @endforeach


        </div>
    @endauth
    @guest
        <div><a class="btn btn-success" href="{{route('register')}}">ورود / ثبت نام</a></div>
        <div><strong>مهمان</strong></div>
    @endguest
    @auth
        <div><a href="{{route('profile',auth()->user()->profile)}}" class="text-white">Name
                : {{auth()->user()->name}}</a></div>
        <div>
            <a href="{{route('discuss')}}" class="text-white">Discuss</a>
            <a href="{{route('admin.dashboard')}}" class="text-white">Dashboard</a>
            <a href="{{route('articles')}}" class="font-weight-bold text-white">Articles</a>
            <a href="/" class="font-weight-bold text-white">Home</a>
        </div>
    @endauth
</div>

    <div class="row" style="width:99%;margin: 10px auto">
        <div >
            <div class="col-md-3" style="flex: 1;padding: 20px;border-radius: 10px;background: #2a9055">
                <a href="" class="btn btn-primary btn-block">Create new discuss</a>
            </div>
            <div class="col-md-9" style="border-radius: 10px ">
                <div class="col-md-12 mt-3" style="flex:1;margin-left: 10px;background: #9fcdff;padding:20px;border-radius: 10px ">
                    <form action="{{route('discuss.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                           <span class="font-weight-bold text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control">
                               @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="font-weight-bold text-danger"> {{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
                            @error('content')
                            <span class="font-weight-bold text-danger"> {{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tag</label>
                            <input type="text" name="tags" placeholder="it should statrt with #  for example  #web#programmer" class="form-control">
                            @error('tags')
                            <span class="font-weight-bold text-danger"> {{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@include('layouts.footer')
