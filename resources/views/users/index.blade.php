@extends('layouts.app')

@section('title')
    {{config('app.name')}} - Guest Administration
@endsection


@section('header_title')
    Guest Administration
@endsection


@section('content')
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Guest List</div>
                        <div class="panel-body">

                            <article>

                                @if(session()->has('ok'))
                                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                                @endif

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{!! $user->id !!}</td>
                                            <td class="text-primary"><strong>{!! $user->name !!}</strong></td>
                                            <td>{!! link_to_route('user.show', 'See', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                            <td>{!! link_to_route('user.edit', 'Modify', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Would you like really delete this user ?\')']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                {!! link_to_route('user.create', 'Add an user', [], ['class' => 'btn btn-info pull-right']) !!}

                                {!! $links !!}

                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection