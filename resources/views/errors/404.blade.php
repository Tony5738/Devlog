@extends('layouts.app')

@section('title')
    {{config('app.name')}} - 404 Not Found
@endsection

@section('header_title')
    Error 404
@endsection

@section('content')
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">A problem occured !</div>
                        <div class="panel-body">
                            <article>
                                <p>Sorry, but this page does not exist.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection