@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Factures</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-8 col-md-offset-2">

                        <!-- form start -->
                        {{ Form::open(array(
                            'method' => 'POST',
                            'id' => 'validate-form',
                            'data-validate' => 'parsley',
                            'class' => 'form-horizontal',
                            'route' => 'admin.profession.store'))
                        }}

                        <!-- panel start -->
                        <div class="panel panel-green">
                           <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Créer</h4></div>
                           <div class="panel-body"><!-- start panel content -->

                                <div class="form-group">
                                      <label for="titreProfession" class="col-sm-3 control-label">Titre de la profession</label>
                                      <div class="col-sm-6">
                                         {{ Form::text('titreProfession', null , array('class' => 'form-control' )) }}
                                      </div>
                                      <div class="col-sm-3">Requis</div>
                                </div>

                            </div><!-- end panel content -->
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            {{ Form::hidden('id', null )}}
                                            <button type="submit" class="btn-primary btn">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end panel -->

                        {{ Form::close() }}


                    </div>
                </div>

            </div>
        </div>
    </div>

@stop