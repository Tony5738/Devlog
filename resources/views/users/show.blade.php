@extends('layouts.app')

@section('title')
    {{config('app.name')}} - User profile
@endsection

@section('header_title')
    User profile
@endsection

@section('content')

    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"Profile</div>
                        <div class="panel-body">
                            <article>
                                <br>

                                <p>Name : {{ $user->name }}</p>
                                <p>Email : {{ $user->email }}</p>
                                <p>Position : {{$user->position}}</p>
                                <p>Role : {{$user->role->name}}</p>

                                <!-- todo add a button for modify his own profile-->
                                {{--@if(Auth::check() and Auth::user()->id ==  or )
                                    <a href="javascript:history.back()" class="btn btn-primary">
                                         Modify your profile
                                    </a>
                                @endif--}}

                                <!-- todo resolve the arrows not loaded-->
                                <a href="javascript:history.back()" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
                                </a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection