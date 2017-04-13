@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Blog
@endsection

@section('content')

    <section>
        <!--<div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Blog</h2>
            </div>
        </div>-->

        <header id="post-list-header">
            <div class="container">
                <h1 class="page-header">Blog</h1>
            </div>
        </header>

        <div class="container">
            @if(isset($info))
                <div class="row alert alert-customize-blue">{{ $info }}</div>
            @endif

            @if(Session::get('message'))
                <div class="row alert alert-customize-blue">{{ Session::get('message') }}</div>
            @endif
        </div>



        @if(Auth::check() and Auth::user()->isAdmin())
                @include('posts.add');
        @endif

        @if(!$posts->isEmpty())

            @foreach($posts as $post)

                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <header>
                                                <h3>{!! link_to('post/'. $post->id,$post->post_title) !!}
                                                    <div class="pull-right">
                                                        @foreach($post->tags as $tag)

                                                            {!! link_to('post/tag/' . $tag->tag_url, $tag->tag, ['class' => 'btn btn-xs btn-customize-blue']) !!}
                                                        @endforeach
                                                    </div>
                                                </h3>
                                            </header>
                                            <hr>
                                            <section>
                                                <article>
                                                    <p>{{ $post->post_content}}</p>

                                                    @if($post->link != null)
                                                        <i class="fa fa-link fa-fw pull-right"></i>
                                                    @endif

                                                    @if($post->image != null)
                                                        <i class="fa fa-picture-o fa-fw pull-right"></i>
                                                    @endif

                                                    @if($post->video != null)
                                                        <i class="fa fa-film fa-fw pull-right"></i>
                                                    @endif

                                                    @if($post->document != null)
                                                        <i class="fa fa-file-text fa-fw pull-right"></i>
                                                    @endif

                                                    @if(Auth::check() and Auth::user()->isAdmin())
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                                                        {!! Form::submit('Delete the post', ['class' => 'btn btn-customize-red btn-xs ', 'onclick' => 'return confirm(\'Really delete this post ?\')']) !!}
                                                        {!! Form::close() !!}
                                                    @endif

                                                    <em class="pull-right">
                                                        <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} on {!! $post->created_at->format('d-m-Y') !!}
                                                    </em>
                                                </article>
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

        <div class="container">
            {!! $links !!}
        </div>

        @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3><strong>No post found</strong></h3>
                    </div>
                </div>
            </div>

        @endif

    </section>

@endsection

