<article>
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Add a post</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'post.store']) !!}

                    <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                        {!! Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Type tags separated by comas')) !!}
                        {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
                    </div>

                    {!! Form::submit('Send !', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</article>

