@extends('layouts.app')

@section('title')
    {{config('app.name')}} - 404 Not Found
@endsection

@section('header_title')
    Error 404
@endsection

@section('section_title')
    A problem occured !
@endsection

@section('content')
    <article>
        <p>Sorry, but this page does not exist.</p>
    </article>
@endsection