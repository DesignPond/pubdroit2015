@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Attestation</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/colloque/'.$colloque_id.'/edit') }}" class="btn btn-info"><i class="fa fa-certificate"></i> &nbsp;Retour au colloque</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="lead"><i class="fa fa-pencil-square"></i>&nbsp; {{ $titre }}</p>
                <!-- panel start -->
                <div class="panel panel-indigo">
                    <div class="panel-heading"><h4><i class="fa fa-envelope-o"></i> &nbsp;Infos pour attestation</h4></div>
                    <div class="panel-body"><!-- start panel content -->

                        <!-- form start -->
                        {{ Form::open(array(
                            'method'        => 'POST',
                            'id'            => 'colloque_attestation',
                            'data-validate' => 'parsley',
                            'class'         => 'validate-form-attestation form-horizontal',
                            'url'           => 'admin/colloque/edit_attestation' ))
                        }}

                        <div class="form-group">
                            <label for="lieu" class="col-sm-3 control-label">Lieu</label>
                            <div class="col-sm-6">

                                @if(!empty($attestation))
                                {{ Form::text('lieu', $attestation->lieu , array('class' => 'form-control required' )) }}
                                @else
                                {{ Form::text('lieu', null , array('class' => 'form-control required' )) }}
                                @endif

                            </div>
                            <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group">
                            <label for="organisateur" class="col-sm-3 control-label">Organisateur</label>
                            <div class="col-sm-6">

                                @if(!empty($attestation))
                                {{ Form::text('organisateur', $attestation->organisateur , array('class' => 'form-control required' )) }}
                                @else
                                {{ Form::text('organisateur', null , array('class' => 'form-control required' )) }}
                                @endif

                            </div>
                            <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>


                        <div class="form-group">
                            <label for="signature" class="col-sm-3 control-label">Signature</label>
                            <div class="col-sm-6">

                                @if(!empty($attestation))
                                {{ Form::text('signature', $attestation->signature , array('class' => 'form-control required' )) }}
                                @else
                                {{ Form::text('signature', null , array('class' => 'form-control required' )) }}
                                @endif

                            </div>
                            <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>


                        <div class="form-group">
                            <label for="responsabilite" class="col-sm-3 control-label">Responsabilite</label>
                            <div class="col-sm-6">

                                @if(!empty($attestation))
                                {{ Form::text('responsabilite', $attestation->responsabilite , array('class' => 'form-control' )) }}
                                @else
                                {{ Form::text('responsabilite', null , array('class' => 'form-control' )) }}
                                @endif

                            </div>
                            <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group">
                            <label for="remarque" class="col-sm-3 control-label">Remarque</label>
                            <div class="col-sm-6">

                                @if(!empty($attestation))
                                {{ Form::textarea('remarque', $attestation->remarque , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
                                @else
                                {{ Form::textarea('remarque', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
                                @endif

                            </div>
                        </div>

                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">

                                @if(!empty($attestation))
                                {{ Form::hidden('id', $attestation->id )}}
                                @endif

                                {{ Form::hidden('colloque_id', $colloque_id )}}

                                <button type="submit" class="btn-primary btn">Envoyer</button>
                            </div>
                        </div>

                        {{ Form::close() }}

                    </div><!-- end panel content -->
                </div><!-- end panel -->

            </div>
        </div>
    </div>

@stop