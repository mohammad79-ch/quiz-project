@extends('admin.layouts.app')

@section('section')

    <div class="row">
        <div class="col-12 ml-3 d-flex" style="justify-content: space-between;align-items: center; margin-bottom: 20px;">
            <div class="col-4">
                <h3>Question</h3>
            </div>
            <div class="col-4">
                <a href="{{route('questions.create')}}" class="btn btn-primary">Add Question</a>
            </div>
        </div>
        <div class="col-md-11 ml-3">
            <div class="card">
                @foreach($questions as $question)
                    <div class="col-md-12 d-flex justify-content-between align-items-center p-5">
                        <div><h3 style="font-size: 17px">{{$question->title}}</h3></div>
                        <div><strong>{{$question->user->name}}</strong></div>
                        <div class="d-flex">
                            <a href="{{route('questions.edit',$question)}}" class="badge badge-warning mr-3">edit</a>
                            <a href="" onclick="event.preventDefault();document.getElementById('delete-{{$question->id}}').submit()" class="badge badge-danger">delete</a>
                        </div>
                        <form action="{{route('questions.destroy',$question)}}" id="delete-{{$question->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>

@endsection
