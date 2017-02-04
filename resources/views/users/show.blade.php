@extends('layouts.app')

@section('title')
    {{config('app.name')}} - User profile
@endsection

@section('header_title')
    User profile
@endsection

@section('section_title')
    Profile
@endsection

@section('content')
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
@endsection