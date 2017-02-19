@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Guest creation
@endsection

@section('header_title')
    Guest creation
@endsection


@section('content')
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create an new Guest !</div>
                        <div class="panel-body">
                            <!--todo add role on form-->
                            <article class="col-sm-offset-4 col-sm-4">
                                <br>

                                <div class="col-sm-12">
                                    {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal panel']) !!}
                                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}

                                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

                                    </div>
                                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

                                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

                                    </div>
                                    <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">

                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

                                        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}

                                    </div>
                                    <div class="form-group">

                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation']) !!}

                                    </div>
                                    <div class="form-group" {!! $errors->has('position') ? 'has-error' : '' !!}>
                                        {!! Form::text('position',null, ['class' => 'form-control', 'placeholder' => 'Position']) !!}

                                        {!! $errors->first('position', '<small class="help-block">:message</small>') !!}
                                    </div>

                                    {!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
                                    {!! Form::close() !!}
                                </div>


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