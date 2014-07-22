<!-- panel start -->

<div class="row">
    @foreach($documents as $type => $document)
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div rel="#{{ $type }}" class="panel-heading event_section"><h4><i class="fa fa-picture-o"></i> &nbsp;{{ ucfirst($type) }}</h4></div>
                <div id="{{ $type }}" class="panel-body"><!-- start panel content -->

                    @if( !empty($allfiles[$type]) )
                        <div class="row">
                        @foreach($document as $doc)

                            @if( isset($allfiles[$type][$doc]) )
                            <div class="col-sm-6">
                                <div class="panel panel-info">
                                    <div class="panel-body admin-icon-panel">
                                        <span class="admin-panel-{{ $type }}">
                                            @if($type == 'images')
                                            <img src="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" class="admin-icon" alt="icon" />
                                            @else
                                            <img src="{{ asset('images/admin/icons/file.png') }}" alt="icon" />
                                            @endif
                                        </span>
                                        <p><strong>{{ ucfirst($doc) }}</strong></p>
                                        <input class="uploadFile" disabled="disabled" placeholder="{{ $allfiles[$type][$doc]->filename }}">
                                        <div class="btn-group admin-icon-options">
                                            <a class="btn btn-sm btn-danger alone_btn deleteAction" data-action="<?php echo $allfiles[$type][$doc]->filename; ?>"
                                               href="{{ url('admin/pubdroit/event/'.$allfiles[$type][$doc]->id.'/destroy_file') }}">X</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-sm-6">
                                <div class="panel panel-info">
                                    <div class="panel-body admin-icon-panel">
                                        <p><strong>{{ ucfirst($doc) }}</strong></p>
                                        {{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
                                        <input class="uploadFile" disabled="disabled" placeholder="">
                                        <input type="hidden" name="destination" value="files/{{ $doc }}/" />
                                        <input type="hidden" name="typeFile" value="{{ $doc }}" />
                                        <input type="hidden" name="event_id" value="{{ $event->id }}" />
                                        <div class="btn-group admin-icon-options">
                                            <div class="fileUpload btn btn-sm btn-primary">
                                                <span>&nbsp;Choisir&nbsp;</span>
                                                <input class="uploadBtn upload" type="file" name="file" />
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                            @endif

                        @endforeach
                        </div>

                    @else

                        @foreach($document as $doc)
                        <div class="col-sm-6">
                            <div class="panel panel-info">
                                <div class="panel-body admin-icon-panel">
                                    <p><strong>{{ ucfirst($doc) }}</strong></p>

                                    {{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
                                    <input class="uploadFile" disabled="disabled" placeholder="">
                                    <input type="hidden" name="destination" value="files/{{ $doc }}/" />
                                    <input type="hidden" name="typeFile" value="{{ $doc }}" />
                                    <input type="hidden" name="event_id" value="{{ $event->id }}" />
                                    <div class="btn-group admin-icon-options">
                                        <div class="fileUpload btn btn-sm btn-primary">
                                            <span>&nbsp;Choisir&nbsp;</span>
                                            <input class="uploadBtn upload" type="file" name="file" />
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
                                    </div>
                                    {{ Form::close() }}

                                </div>
                            </div>
                        </div>
                        @endforeach

                    @endif
                </div>
            </div><!-- end panel content -->
        </div><!-- end panel -->
    @endforeach
</div>
