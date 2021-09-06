@extends('admin.layouts.app')

@section('section')

    <div class="row">
        <div class="col-12 ml-3 d-flex" style="justify-content: space-between;align-items: center; margin-bottom: 20px;">
            <div class="col-4">
                <h3>Edit Question</h3>
            </div>
        </div>
        <div class="col-md-11 ml-3">
            <div class="card">
                <form action="{{route('questions.update',$question->id)}}" method="post">
                @csrf
                    @method("PUT")
                    <div class="form-group">
                        <input type="text" name="title" placeholder="title ..." class="form-control" value="{{$question->title}}">
                    </div>

                    <div class="form-group">
                        <input type="submit"  class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
