@extends('admin.layouts.app')

@section('section')

    <div class="row">
        <div class="col-12 ml-3 d-flex" style="justify-content: space-between;align-items: center; margin-bottom: 20px;">
            <div class="col-4">
                <h3>Create Question</h3>
            </div>
        </div>
        <div class="col-md-11 ml-3">
            <div class="card">
                <form action="{{route('questions.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="text" name="title" placeholder="title ..." class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit"  class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
