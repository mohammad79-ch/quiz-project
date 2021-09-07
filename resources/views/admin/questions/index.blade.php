@extends('admin.layouts.app')

@section('section')

    <div class="row">
        <div class="col-12 ml-3 d-flex"
             style="justify-content: space-between;align-items: center; margin-bottom: 20px;">
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
                    <div class="col-md-12 d-flex justify-content-between align-items-center p-2">
                        <div style="flex: 1"><h3 style="font-size: 17px">{{$question->title}}</h3></div>
                        <div style="flex: 1"><strong>{{$question->user->name}}</strong></div>
                        <div style="flex: 1" class="d-flex">
                            <a href="{{route('questions.edit',$question)}}" class="badge badge-warning mr-3">edit</a>
                            <a href=""
                               onclick="event.preventDefault();document.getElementById('delete-{{$question->id}}').submit()"
                               class="badge badge-danger">delete</a>
                            <a href="{{route('sub_question.create',$question)}}" class="badge badge-primary ml-3">Add
                                SubQuestion</a>
                        </div>
                        <form action="{{route('questions.destroy',$question)}}" id="delete-{{$question->id}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    <div class="card" style="height:auto;padding: 20px">
                        <ul style="list-style: none;padding: 10px">
                            @foreach($question->subQuestion as $sub)
                                <div class="d-flex justify-content-between">
                                <div>    <li class="card-body bg-light mt-2">{{$sub->title}}</li></div>

                                       <div class="d-flex">
                                    @if($sub->is_answer)
                                           <li class="card-body bg-light mt-2">
                                               <span class="badge badge-success">isAnswer</span>
                                           </li>

                                          @endif
                                           <li class="card-body bg-light ml-2">
                                               <a href="{{route('sub_question.edit',$sub)}}" class="badge badge-warning">edit</a>
                                           </li>
                                           <li class="card-body bg-light ml-2">
                                               <a href="#" onclick="event.preventDefault();document.getElementById('delete-sub-{{$sub->id}}').submit()" class="badge badge-danger">delete</a>
                                           </li>

                                        <form action="{{route('sub_question.destroy',$sub)}}" method="post" id="delete-sub-{{$sub->id}}">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                       </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>

@endsection
