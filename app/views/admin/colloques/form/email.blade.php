@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Email<br/><small>Texte envoyé avec l'inscription</small></h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/colloque/'.$colloque_id.'/edit') }}" class="btn btn-info"><i class="fa fa-certificate"></i> &nbsp;Retour au colloque</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-7">

                <!-- panel start -->
                <div class="panel panel-orange">
                    <div class="panel-heading"><h4><i class="fa fa-envelope-o"></i> &nbsp;Texte </h4></div>
                    <div class="panel-body"><!-- start panel content -->

                        <p class="lead">Le texte indiqué remplace celui par défaut envoyé avec les documents lors d'une inscription sur le site.</p>
                        <!-- form start -->
                        {{ Form::model($email,array(
                            'method'        => 'POST',
                            'id'            => 'colloque_email',
                            'data-validate' => 'parsley',
                            'class'         => 'validate-form-email form',
                            'url'           => array('admin/colloque/edit_email')))
                        }}

                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Nouveau texte</label>
                            <div class="col-sm-10">

                                @if(!empty($email))
                                {{ Form::textarea('message', $email->message , array('class' => 'form-control  redactor', 'cols' => '50' , 'rows' => '4' )) }}
                                @else
                                {{ Form::textarea('message', null , array('class' => 'form-control redactor required', 'cols' => '50' , 'rows' => '4' )) }}
                                @endif

                            </div>
                        </div>

                        <div class="col-sm-12 margeBottom">

                            @if(!empty($email))
                            {{ Form::hidden('id', $email->id )}}
                            @endif

                            {{ Form::hidden('type', 'inscription' )}}
                            {{ Form::hidden('colloque_id', $colloque_id )}}

                            <button type="submit" class="btn-primary btn">Envoyer</button>

                        </div>

                        {{ Form::close() }}

                    </div><!-- end panel content -->
                </div><!-- end panel -->

            </div>

            <div class="col-sm-5">

                <!-- panel start -->
                <div class="panel panel-inverse">
                    <div class="panel-heading"><h4><i class="fa fa-envelope-o"></i> &nbsp;Texte email par défaut</h4></div>
                    <div class="panel-body"><!-- start panel content -->

                        @if( !empty($default) )
                            <div class="well">{{ $default->message }}</div>
                        @endif

                    </div><!-- end panel content -->
                </div><!-- end panel -->

            </div>

        </div>
    </div>

@stop