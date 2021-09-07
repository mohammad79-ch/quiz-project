@extends('admin.layouts.app')

@section('section')

    <div class="row">
        <div class="col-12 ml-3 d-flex" style="justify-content: space-between;align-items: center; margin-bottom: 20px;">
            <div class="col-4">
                <h3>Create Question</h3>
            </div>
        </div>
        <div class="col-md-11 ml-3">
            <div class="card p-3">
                <form action="{{route('sub_question.update',$sub_question)}}" method="post">
                @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" placeholder="title ..." value="{{$sub_question->title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <span class="text-secondary">is Answer</span>
                        <input type="checkbox" @if($sub_question->is_answer) checked @endif  name="is_answer">
                    </div>

                    <div class="form-group ">
                        <input type="submit"  class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
