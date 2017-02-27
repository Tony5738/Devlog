@extends('layouts.app')

@section('title')
    {{config('app.name')}} - {{$post->title}}
@endsection

@section('header_title')
    {{$post->title}}
@endsection

@section('header_content')

    @if(Auth::check() and Auth::user()->isAdmin())

        <a href="{!!URL::to('post/'.$post->id.'/edit')!!}" class="btn btn-primary pull-right">
            <i class="icon glyphicon glyphicon-pencil"></i> {{ 'Edit' }}</a>
    @endif

@endsection

@section('content')

    <section class="container">

        @if(isset($info))
            <div class="row alert alert-info">{{ $info }}</div>
        @endif

        <article>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <header>
                                        <h1>
                                            {{$post->title}}
                                            <div class="pull-right">
                                                @foreach($post->tags as $tag)
                                                    <p class="show-tags">{{$tag->tag}}</p>
                                                @endforeach
                                            </div>
                                        </h1>
                                    </header>
                                    <hr>
                                    <section>

                                        <p>{{ $post->content}}</p>

                                        <em class="pull-right">
                                            <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} on {!! $post->created_at->format('d-m-Y') !!}
                                        </em>
                                    </section>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <br>


    </section>

@endsection