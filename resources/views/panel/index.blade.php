@extends('layouts.app')

@section('section')
    <div class="container">
        <div class="d-flex mt-3">
            <div style="flex: 1">
                <div class="card p-3">
                    <div class="header">
                       All Details Blong to {{$user->name}}
                    </div>
                    <hr>
                    <div class="card-body">
                        @auth
                            <div class="text-center mt-3">
                                <img src="{{!is_null($user->image) ? asset('userImg/'.$user->image) : asset('images/defUser.png')}}" width="50" alt="">
                            </div>

                            <div class="d-flex justify-content-around mt-3">
                                <p style="font-size: 14px;font-weight: bold;margin: 3px">followers</p>
                                <p style="font-size: 14px;font-weight: bold;margin: 3px">following</p>
                                <p style="font-size: 14px;font-weight: bold;margin: 3px">posts</p>
                            </div>
                            @livewire('follow-component',['user'=>$user])
                        @endauth
                            <div class="d-flex justify-content-between">
                                <div><p style="font-size: 12px">All Answer</p></div>
                                <div><p class="bg-warning text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">{{$totalAnswer}}</p></div>
                            </div>
                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">Correct Answer</p></div>
                            <div><p class="bg-success text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                {{$correctAnswer}}
                            </p></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><p style="font-size: 12px">Correct Answer</p></div>
                            <div><p class="bg-danger text-center" style="width: 20px;height:20px;border-radius: 50%;font-size: 12px">
                                {{$wrongAnswer}}
                            </p></div>
                        </div>

                    </div>
                </div>
            </div>
            <div style="flex:3;margin-left: 15px" >
                <div class="card  p-3">
                    <div class="header">
                        Content
                    </div>
                    <hr>
                </div>
            </div>
            <div style="flex:1;margin-left: 15px">
                <div class="card  p-3">
                    <div class="header">
                        AboutMe
                    </div>
                    <hr>
                    <div class="card-body">
                        <p>{{$user->aboutMe}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
