@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Edit a post
@endsection

@section('header_title')
    Edit a post
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        {!! Form::open(['route' => ['post.update', $post->id], 'method' => 'PUT']) !!}

                            <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                                {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('content', $post->content, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
                                {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
                            </div>


                            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                                {!! Form::text('tags',(isset($tagString))? $tagString : null , array('class' => 'form-control', 'placeholder' => 'Type tags separated by comas')) !!}
                                {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
                            </div>

                            {!! Form::submit('Update !', ['class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection