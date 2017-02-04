@extends('layouts.app')

@section('title')
    {{config('app.name')}} - User modification
@endsection

@section('header_title')
    User modification
@endsection

@section('section_title')
    Edit an User
@endsection

@section('content')

    <!--todo add role on form-->

    <article>
        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal panel']) !!}

        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}

            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

        </div>

        <div class="form-group" {!! $errors->has('position') ? 'has-error' : '' !!}>
            {!! Form::text('position', null,['class' => 'form-control', 'placeholder' => 'Position']) !!}

            {!! $errors->first('position', '<small class="help-block">:message</small>') !!}
        </div>

        {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}

        {!! Form::close() !!}


        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </article>

@endsection