@extends('layouts.app')

@section('title')
    {{config('app.name')}} - {{$post->post_title}}
@endsection

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">{{$post->post_title}}</h2>
            </div>
        </div>

        @if(isset($info))
            <div class="row alert alert-info">{{ $info }}</div>
        @endif

        <article>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <header>
                                    <h3>
                                        {{$post->post_title}}
                                        <div class="pull-right">
                                            @foreach($post->tags as $tag)
                                                <p class="show-tags">{{$tag->tag}}</p>
                                            @endforeach
                                        </div>
                                    </h3>
                                </header>
                                <hr>
                                <section>

                                    <p>{{ $post->post_content}}</p>

                                    <em class="pull-right">
                                        <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} on {!! $post->created_at->format('d-m-Y') !!}
                                    </em>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @if($post->link != null || $post->image != null || $post->video != null || $post->document != null)
            <article>
                <div class="container">
                    <h3>Medias</h3>
                    <div class="row">
                        <div class="col-md-12">
                            @if($post->link != null)
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-1"><i class="fa fa-link fa-fw"></i></div>
                                            <div class="col-lg-6">
                                                <a href="{!! $post->link->link_url !!}" target="_blank"><strong>{!! $post->link->link_title !!}</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($post->image != null)
                                <!--todo js to scale image-->
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-lg-1"><i class="fa fa-picture-o fa-fw"></i></div>
                                            <div class="col-lg-6">

                                                <p><strong>{!! $post->image->image_title !!}</strong></p>
                                                <img src="{!! '\images\\'.$post->image->image !!}" alt="{!! $post->image->image_title !!}"/>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($post->video != null)
                                <!--todo js to scale image-->
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-lg-1"><i class="fa fa-film fa-fw"></i></div>
                                            <div class="col-lg-6">

                                                <p><strong>{!! $post->video->video_title !!}</strong></p>
                                                <video width = 400 height = 225 controls>
                                                    <source src="{!! '\videos\\'.$post->video->video !!}" type="video/mp4">
                                                    <p>
                                                        If your browser doesn't seem to support HTML5 video.
                                                        <a href="{!! '\videos\\'.$post->video->video !!}">Download</a> the video instead.
                                                    </p>
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($post->document != null)
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-1"><i class="fa fa-file-text fa-fw"></i></div>

                                            <div class="col-lg-6">
                                                <a href="{!! '\documents\\'.$post->document->document !!}" target="_blank"><strong>{!! $post->document->document_title !!}</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        @endif

        @if(Auth::check() and Auth::user()->isAdmin())

            <a href="{!!URL::to('post/'.$post->id.'/edit')!!}" class="btn btn-customize-blue pull-right">
                <i class="icon glyphicon glyphicon-pencil"></i> {{ 'Edit' }}</a>
        @endif

        <br>


    </section>

@endsection