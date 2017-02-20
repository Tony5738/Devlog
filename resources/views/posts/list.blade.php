@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Blog
@endsection

@section('header_title')
    Blog
@endsection


@section('content')

    <section class="container">

        @if(isset($info))
            <div class="row alert alert-info">{{ $info }}</div>
        @endif

        @if(Auth::check() and Auth::user()->isAdmin())
                @include('posts.add');
        @endif


        @foreach($posts as $post)

            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <header>
                                            <h1>{!! link_to('post/'. $post->id,$post->title) !!}
                                                <div class="pull-right">
                                                    @foreach($post->tags as $tag)

                                                        {!! link_to('post/tag/' . $tag->tag_url, $tag->tag, ['class' => 'btn btn-xs btn-info']) !!}
                                                    @endforeach
                                                </div>
                                            </h1>
                                        </header>
                                        <hr>
                                        <section>

                                            <p>{{ $post->content}}</p>

                                            @if(Auth::check() and Auth::user()->isAdmin())
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                                                {!! Form::submit('Delete the post', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Really delete this post ?\')']) !!}
                                                {!! Form::close() !!}
                                            @endif

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

        @endforeach

        {!! $links !!}

    </section>

@endsection