<!-- panel start -->

<div class="row">
@if($documents)
    @foreach($documents as $type => $document)
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div rel="#{{ $type }}" class="panel-heading">
                    <h4><i class="fa fa-picture-o"></i> &nbsp;{{ ucfirst($type) }}</h4>
                    <div class="options">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#list-docs-{{$type}}" data-toggle="tab">Liste</a></li>
                            <li><a href="#infos-docs-{{$type}}" data-toggle="tab">Infos</a></li>
                        </ul>
                    </div>
                </div>
                <div id="{{ $type }}" class="panel-body"><!-- start panel content -->

                    <div class="tab-content"><!-- start tab content -->
                        <div class="tab-pane active" id="list-docs-{{$type}}"><!-- start first tab pane -->
                            @if( !empty($allfiles[$type]) )
                            <div class="row">
                                @foreach($document as $doc)
                                <div class="col-sm-6">
                                    <div class="panel panel-info">
                                        <div class="panel-body admin-icon-panel">

                                            <div class="doc-admin-title">
                                                <p><strong>{{ ucfirst($doc) }}</strong></p>
                                            </div>

                                            @if( isset($allfiles[$type][$doc]) )

                                                <span class="admin-panel-{{ $type }}">
                                                    @if($type == 'images')
                                                    <a href="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" target="_blank">
                                                        <img src="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" class="admin-icon" alt="icon" />
                                                    </a>
                                                    @else
                                                    <a href="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" target="_blank">
                                                        <img src="{{ asset('images/admin/icons/file.png') }}" alt="icon" />
                                                    </a>
                                                    @endif
                                                </span>

                                                 <input class="uploadFile" disabled="disabled" placeholder="{{ $allfiles[$type][$doc]->filename }}">
                                                 <a class="btn btn-xs btn-danger alone_btn deleteAction" data-action="<?php echo $allfiles[$type][$doc]->filename; ?>"
                                                    href="{{ url('admin/pubdroit/colloque/'.$allfiles[$type][$doc]->id.'/destroy_file') }}">X</a>

                                            @else

                                            {{ Form::open(array( 'url' => 'admin/colloque/upload' ,'files' => true )) }}
                                                <input class="uploadFile" disabled="disabled" placeholder="">
                                                <input type="hidden" name="destination" value="files/{{ $doc }}/" />
                                                <input type="hidden" name="type" value="{{ $doc }}" />
                                                <input type="hidden" name="colloque_id" value="{{ $colloque->id }}" />
                                                <div class="btn-group admin-icon-options">
                                                    <div class="fileUpload btn btn-sm btn-primary">
                                                        <span>&nbsp;Choisir&nbsp;</span>
                                                        <input class="uploadBtn upload" type="file" name="file" />
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-success btn-envoyer">&nbsp;Envoyer&nbsp;</button>
                                                </div>
                                            {{ Form::close() }}

                                            @endif

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @else
                                @foreach($document as $doc)
                                <div class="col-sm-6">
                                    <div class="panel panel-info">
                                        <div class="panel-body admin-icon-panel">
                                            <p><strong>{{ ucfirst($doc) }}</strong></p>

                                            {{ Form::open(array( 'url' => 'admin/colloque/upload' ,'files' => true )) }}
                                            <input class="uploadFile" disabled="disabled" placeholder="">
                                            <input type="hidden" name="destination" value="files/{{ $doc }}/" />
                                            <input type="hidden" name="type" value="{{ $doc }}" />
                                            <input type="hidden" name="colloque_id" value="{{ $colloque->id }}" />
                                            <div class="btn-group admin-icon-options">
                                                <div class="fileUpload btn btn-sm btn-primary">
                                                    <span>&nbsp;Choisir&nbsp;</span>
                                                    <input class="uploadBtn upload" type="file" name="file" />
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-success">&nbsp;Envoyer&nbsp;</button>
                                            </div>
                                            {{ Form::close() }}

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div><!-- end first tab pane -->

                        <div class="tab-pane" id="infos-docs-{{$type}}">
                            <dl class="dl-horizontal">
                                @if( $type == 'images' )
                                    <dt>Carte</dt>
                                    <dd>La carte est pour le bon</dd>
                                    <dt>Vignette</dt>
                                    <dd>La vignette est l'image d'illustration du colloque sur publication-droit.ch</dd>
                                    <dt>Badge</dt>
                                    <dd>Le logo de l'organisateur, se retrouve aussi sur les autres documents générés</dd>
                                @else
                                    <dt>Programme</dt>
                                    <dd>Le programme du colloque en pdf.</dd>
                                    <dt>Pdf</dt>
                                    <dd>Un autre pdf, image ou document (optionnel)</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div><!-- end tab content -->
            </div><!-- end panel content -->
        </div><!-- end panel -->
    @endforeach
@endif
</div>