@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Créer un colloque</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <!-- panel start -->
                <div class="panel panel-primary">
                  <!-- form start -->
                  {{ Form::open(array( 'url' => 'admin/colloque','data-validate' => 'parsley', 'class' => 'form-horizontal')) }}
                   <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> &nbsp;Général</h4></div>
                    <div class="panel-body"><!-- start panel content -->

                          <div class="form-group">
                              <label for="organisateur" class="col-sm-3 control-label">Organisateur</label>
                              <div class="col-sm-6">
                                  {{ Form::text('organisateur', '' , array('class' => 'form-control required' )) }}
                              </div>
                              <div class="col-sm-3"><p class="help-block">Requis</p></div>
                          </div>

                          <div class="form-group">
                              <label for="titre" class="col-sm-3 control-label">Titre</label>
                              <div class="col-sm-6">
                                  {{ Form::text('titre', '' , array('class' => 'form-control required' )) }}
                              </div>
                              <div class="col-sm-3"><p class="help-block">Requis</p></div>
                          </div>

                          <div class="form-group">
                              <label for="soustitre" class="col-sm-3 control-label">Sous-titre</label>
                              <div class="col-sm-6">
                                  {{ Form::text('soustitre', '' , array('class' => 'form-control' )) }}
                              </div>
                              <div class="col-sm-3"><p class="help-block"></p></div>
                          </div>

                          <div class="form-group">
                              <label for="sujet" class="col-sm-3 control-label">Sujet</label>
                              <div class="col-sm-6">
                                  {{ Form::text('sujet', '' , array('class' => 'form-control required' )) }}
                              </div>
                              <div class="col-sm-3"><p class="help-block">Requis</p></div>
                          </div>

                          <div class="form-group">
                              <label for="description" class="col-sm-3 control-label">Description</label>
                              <div class="col-sm-6">
                                 <textarea name="description" id="description" cols="50" rows="4" class="redactor form-control"></textarea>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="endroit" class="col-sm-3 control-label">Endroit</label>
                              <div class="col-sm-6">
                                 {{ Form::text('endroit', '' , array('class' => 'form-control required' )) }}
                              </div>
                          </div>

                          <div class="form-group">
                               <label class="col-sm-3 control-label">Date de début</label>
                               <div class="col-sm-6">
                                   <input type="text" name="dateDebut" class="form-control datepicker required" id="dateDebut">
                               </div>
                          </div>

                          <div class="form-group">
                               <label class="col-sm-3 control-label">Date de fin</label>
                               <div class="col-sm-6">
                                   <input type="text" name="dateFin" class="form-control datepicker" id="dateFin">
                               </div>
                          </div>

                          <div class="form-group">
                               <label class="col-sm-3 control-label">Délai d'inscription</label>
                               <div class="col-sm-6">
                                   <input type="text" name="dateDelai" class="form-control datepicker" id="dateDelai">
                               </div>
                          </div>

                          <div class="form-group">
                              <label for="remarques" class="col-sm-3 control-label">Remarques</label>
                              <div class="col-sm-6">
                                 <textarea name="remarques" id="remarques" cols="50" rows="4" class="redactor form-control"></textarea>
                              </div>
                          </div>

                        <!-- form end -->
                    </div><!-- end panel content -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn-primary btn">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div><!-- end panel -->

            </div>
        </div>
    </div>
    
@stop