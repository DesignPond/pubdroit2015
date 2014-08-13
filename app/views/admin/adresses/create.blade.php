@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom;  ?>
	
    <div id="page-heading">
        <h1>Ajouter adresse <?php if( $user_id != 0){ echo 'pour utilisateur'; }?></h1>
    </div>

    <div class="container"><!-- container -->

        <div class="row"><!-- row -->
            <div class="col-md-12"><!-- col -->
                <?php if( $user_id != 0){ ?>
                    <p><a class="btn btn-default" href="{{ url('admin/users/'.$user_id) }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>
                <?php } else { ?>
                    <p><a class="btn btn-default" href="{{ url('admin/adresses') }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>
                <?php } ?>
            </div>
        </div>

        <div class="row"><!-- row -->
            <div class="col-md-6"><!-- col -->

            @if(empty($types))
                <div class="alert alert-dismissable alert-danger">
                    <h3>Attention!</h3>
                    <p><strong>Il existe déjà 3 types d'adresses!</strong></p>
                </div>
            @endif

                <div class="panel panel-midnightblue"><!-- panel -->
                    <div class="panel-body"><!-- panel body -->

                        {{ Form::open(array( 'url' => 'admin/adresses' , 'data-validate' => 'parsley' ,'class' => 'validate-form form-horizontal')) }}

                        <h3><strong>Type d'adresse</strong></h3>

                        <div class="form-group row">
                             <label for="type" class="col-sm-3 control-label">Type</label>
                             <div class="col-sm-6">
                                {{ Form::select('type', $types , null , array( 'class' => 'form-control required' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <h3><strong>Nouvelle adresse</strong></h3>

                        <div class="form-group row">
                             <label for="civilite" class="col-sm-3 control-label">Civilite</label>
                             <div class="col-sm-6">
                                {{ Form::select('civilite', $civilites , null , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="prenom" class="col-sm-3 control-label">Prénom</label>
                             <div class="col-sm-6">
                                {{ Form::text('prenom', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="nom" class="col-sm-3 control-label">Nom</label>
                             <div class="col-sm-6">
                                {{ Form::text('nom', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="email" class="col-sm-3 control-label">Email</label>
                             <div class="col-sm-6">
                                {{ Form::text('email', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="entreprise" class="col-sm-3 control-label">Entreprise</label>
                             <div class="col-sm-6">
                                {{ Form::text('entreprise', null , array('class' => 'form-control' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="profession" class="col-sm-3 control-label">Profession</label>
                             <div class="col-sm-6">
                                {{ Form::select('profession', $professions , 0 , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="fonction" class="col-sm-3 control-label">Fonction</label>
                             <div class="col-sm-6">
                                {{ Form::text('fonction', null , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="telephone" class="col-sm-3 control-label">Téléphone</label>
                             <div class="col-sm-6">
                                {{ Form::text('telephone', null , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                             <div class="col-sm-6">
                                {{ Form::text('mobile', null , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="fax" class="col-sm-3 control-label">Fax</label>
                             <div class="col-sm-6">
                                {{ Form::text('fax', null , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="adresse" class="col-sm-3 control-label">Adresse</label>
                             <div class="col-sm-6">
                                {{ Form::text('adresse', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="complement" class="col-sm-3 control-label">Complément d'adresse</label>
                             <div class="col-sm-6">
                                {{ Form::text('complement', null , array('class' => 'form-control' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="cp" class="col-sm-3 control-label">Case postale</label>
                             <div class="col-sm-6">
                                {{ Form::text('cp', null , array('class' => 'form-control' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="npa" class="col-sm-3 control-label">NPA</label>
                             <div class="col-sm-6">
                                {{ Form::text('npa', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="ville" class="col-sm-3 control-label">Ville</label>
                             <div class="col-sm-6">
                                {{ Form::text('ville', null , array('class' => 'form-control required' )) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                        <div class="form-group row">
                             <label for="canton" class="col-sm-3 control-label">Canton</label>
                             <div class="col-sm-6">
                                {{ Form::select('canton', $cantons , 0 , array( 'class' => 'form-control' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block"></p></div>
                        </div>

                        <div class="form-group row">
                             <label for="pays" class="col-sm-3 control-label">Pays</label>
                             <div class="col-sm-6">
                                {{ Form::select('pays', $pays , 208 , array( 'class' => 'form-control required' ) ) }}
                             </div>
                             <div class="col-sm-3"><p class="help-block">Requis</p></div>
                        </div>

                    </div><!-- end panel body -->

                    <div class="panel-footer">
                        <div class="row">
                            <div class="btn-toolbar">
                                <?php

                                    if( $user_id != 0)
                                    {
                                        echo Form::hidden('redirectTo', 'users/'.$user_id);
                                        echo Form::hidden('user_id', $user_id);
                                    }
                                ?>
                                {{ Form::hidden('livraison', $livraison ) }}
                                <button type="submit" class="btn-primary btn">Envoyer</button>
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}

                </div><!-- end panel -->

                </div><!-- end col -->

        </div><!-- end row -->

    </div><!-- end container -->


@stop
