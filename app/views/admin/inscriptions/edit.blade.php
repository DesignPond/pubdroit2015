@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Inscription</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-8 col-md-offset-2">

                        <!-- form start -->
                        {{ Form::model($inscription,array(
                            'method' => 'PATCH',
                            'id' => 'validate-form',
                            'data-validate' => 'parsley',
                            'class' => 'form-horizontal',
                            'route' => array('admin.inscription.update',$inscription->id)))
                        }}

                        <!-- panel start -->
                        <div class="panel panel-green">
                           <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> &Eacute;diter</h4></div>
                           <div class="panel-body"><!-- start panel content -->

                               <div class="form-group">
                                   <label for="colloque_price_id" class="col-sm-3 control-label">Prix colloque</label>
                                   <div class="col-sm-6">
                                       {{ Form::text('colloque_price_id',null , array('class' => 'form-control' )) }}
                                   </div>
                                   <div class="col-sm-3">Requis</div>
                               </div>

                               <div class="form-group">
                                   <label for="colloque_id" class="col-sm-3 control-label">Colloque</label>
                                   <div class="col-sm-6">
                                       {{ Form::text('colloque_id',null , array('class' => 'form-control' )) }}
                                   </div>
                                   <div class="col-sm-3">Requis</div>
                               </div>

                               <div class="form-group">
                                   <label for="user_id" class="col-sm-3 control-label">User</label>
                                   <div class="col-sm-6">
                                       {{ Form::text('user_id', null , array('class' => 'form-control' )) }}
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