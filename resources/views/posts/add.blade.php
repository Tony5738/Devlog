
<article>
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Add a post</div>
                <div class="panel-body">

                    {!! Form::open(['route' => 'post.store', 'method' => 'POST']) !!}

                        <div class="col-lg-6">
                            <div class="form-group {!! $errors->has('post_title') ? 'has-error' : '' !!}">
                                {!! Form::text('post_title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                {!! $errors->first('post_title', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group {!! $errors->has('post_content') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('post_content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
                                {!! $errors->first('post_content', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                                {!! Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Type tags separated by comas')) !!}
                                {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">Link
                                    <div class="panel-body media-form">
                                        <div class="form-group {!! $errors->has('link_title') ? 'has-error' : '' !!}">
                                            {!! Form::label('link_title', 'Link title', array('class' => 'control-label' )) !!}

                                            {!! Form::text('link_title', null, ['class' => 'form-control', 'placeholder' => 'Link title','id' => 'link_title']) !!}
                                            {!! $errors->first('link_title', '<small class="help-block">:message</small>') !!}

                                        </div>

                                        <div class="form-group {!! $errors->has('link_url') ? 'has-error' : '' !!}">
                                            {!! Form::label('link_url', 'Link URL', array('class' => 'control-label' )) !!}

                                            {!! Form::text('link_url', null, ['class' => 'form-control', 'placeholder' => 'Link URL','id' => 'link_url']) !!}
                                            {!! $errors->first('link_url', '<small class="help-block">:message</small>') !!}


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--todo other media and finish link-->





                        </div>
                        <div class="row">
                            <div class="pull-left">
                                {!! Form::submit('Send !', ['class' => 'btn btn-info']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</article>




