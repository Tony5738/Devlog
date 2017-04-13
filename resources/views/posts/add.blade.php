
<article>
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-customize-orange">
                <div class="panel-heading"><strong>Add a post</strong></div>
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

                        <div>

                            <h3>Medias</h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="link" class="active"><a href="#link" aria-controls="link" role="tab" data-toggle="tab"><i class="fa fa-link fa-fw"></i></a></li>
                                <li role="image"><a href="#image" aria-controls="image" role="tab" data-toggle="tab"><i class="fa fa-picture-o fa-fw"></i></a></li>
                                <li role="video"><a href="#video" aria-controls="video" role="tab" data-toggle="tab"><i class="fa fa-film fa-fw"></i></a></li>
                                <li role="document"><a href="#document" aria-controls="document" role="tab" data-toggle="tab"><i class="fa fa-file-text fa-fw"></i></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="link">

                                    <div class="form-group {!! $errors->has('link_title') ? 'has-error' : '' !!}">
                                        {!! Form::label('link_title', 'Link title', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::text('link_title', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('link_title', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {!! $errors->has('link_url') ? 'has-error' : '' !!}">
                                        {!! Form::label('link_url', 'Link URL', array('class' => 'control-label col-md-4' )) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('link_url', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('link_url', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="image">
                                    <div class="form-group {!! $errors->has('image_title') ? 'has-error' : '' !!}">
                                        {!! Form::label('image_title', 'Image title', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::text('image_title', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('image_title', '<small class="help-block">:message</small>') !!}
                                        </div>


                                    </div>

                                    <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                                        {!! Form::label('image', 'Image', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::file('image') !!}
                                            {!! $errors->first('image', '<small class="help-block">:message</small>') !!}
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="video">
                                    <div class="form-group {!! $errors->has('video_title') ? 'has-error' : '' !!}">
                                        {!! Form::label('video_title', 'Video title', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::text('video_title', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('video_title', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {!! $errors->has('video') ? 'has-error' : '' !!}">
                                        {!! Form::label('video', 'Video', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::file('video') !!}
                                            {!! $errors->first('video', '<small class="help-block">:message</small>') !!}
                                        </div>


                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="document">
                                    <div class="form-group {!! $errors->has('document_title') ? 'has-error' : '' !!}">
                                        {!! Form::label('document_title', 'Document title', array('class' => 'control-label col-md-4' )) !!}

                                        <div class="col-md-8">
                                            {!! Form::text('document_title', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('document_title', '<small class="help-block">:message</small>') !!}
                                        </div>

                                    </div>

                                    <div class="form-group {!! $errors->has('document') ? 'has-error' : '' !!}">
                                        {!! Form::label('document', 'Document', array('class' => 'control-label col-md-4' )) !!}
                                        <div class="col-md-8">

                                            {!! Form::file('document') !!}
                                            {!! $errors->first('document', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                {!! Form::submit('Send !', ['class' => 'btn btn-customize-blue']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</article>




