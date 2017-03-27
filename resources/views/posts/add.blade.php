
<article>
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Add a post</div>
                <div class="panel-body">

                    {!! Form::open(['route' => 'post.store', 'method' => 'POST','enctype' =>"multipart/form-data"]) !!}

                        <div class="row">
                            <div class="col-lg-12">
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
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-info">
                                    <div id="link" class="panel-heading">Link
                                        <div class="panel-body media-form">
                                            <div class="form-group {!! $errors->has('link_title') ? 'has-error' : '' !!}">
                                                {!! Form::label('link_title', 'Link title', array('class' => 'control-label' )) !!}

                                                {!! Form::text('link_title', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('link_title', '<small class="help-block">:message</small>') !!}

                                            </div>

                                            <div class="form-group {!! $errors->has('link_url') ? 'has-error' : '' !!}">
                                                {!! Form::label('link_url', 'Link URL', array('class' => 'control-label' )) !!}

                                                {!! Form::text('link_url', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('link_url', '<small class="help-block">:message</small>') !!}

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--todo file input responsive to fix-->
                            <div class="col-lg-6">
                                <div  class="panel panel-info">
                                    <div id="image" class="panel-heading">Image
                                        <div class="panel-body media-form">
                                            <div class="form-group {!! $errors->has('image_title') ? 'has-error' : '' !!}">
                                                {!! Form::label('image_title', 'Image title', array('class' => 'control-label' )) !!}

                                                {!! Form::text('image_title', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('image_title', '<small class="help-block">:message</small>') !!}

                                            </div>

                                            <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                                                {!! Form::label('image', 'Image', array('class' => 'control-label' )) !!}

                                                {!! Form::file('image') !!}
                                                {!! $errors->first('image', '<small class="help-block">:message</small>') !!}


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--todo file input responsive to fix-->
                            <div class="col-lg-6">
                                <div  class="panel panel-info">
                                    <div id="video" class="panel-heading">Video
                                        <div class="panel-body media-form">
                                            <div class="form-group {!! $errors->has('video_title') ? 'has-error' : '' !!}">
                                                {!! Form::label('video_title', 'Video title', array('class' => 'control-label' )) !!}

                                                {!! Form::text('video_title', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('video_title', '<small class="help-block">:message</small>') !!}

                                            </div>

                                            <div class="form-group {!! $errors->has('video') ? 'has-error' : '' !!}">
                                                {!! Form::label('video', 'Video', array('class' => 'control-label' )) !!}

                                                {!! Form::file('video') !!}
                                                {!! $errors->first('video', '<small class="help-block">:message</small>') !!}


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--todo file input responsive to fix-->
                            <div class="col-lg-6">
                                <div  class="panel panel-info">
                                    <div id="document" class="panel-heading">Document
                                        <div class="panel-body media-form">
                                            <div class="form-group {!! $errors->has('doc_name') ? 'has-error' : '' !!}">
                                                {!! Form::label('doc_name', 'Document name', array('class' => 'control-label' )) !!}

                                                {!! Form::text('doc_name', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('doc_name', '<small class="help-block">:message</small>') !!}

                                            </div>

                                            <div class="form-group {!! $errors->has('doc') ? 'has-error' : '' !!}">
                                                {!! Form::label('doc', 'Document', array('class' => 'control-label' )) !!}

                                                {!! Form::file('doc') !!}
                                                {!! $errors->first('doc', '<small class="help-block">:message</small>') !!}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>








                        <div class="row">
                            <div class="col-lg-2">
                                {!! Form::submit('Send !', ['class' => 'btn btn-info']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</article>




