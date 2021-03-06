@extends('layouts.admin')
@section('content')

<?php  

	// HELPER
	$custom      = new Custom;
	
	//ADRESSES
	$adresses    = $user->adresses; 															
	$nbr_adresse = $adresses->count();
	$col         = ($nbr_adresse > 2 ? 4 : 6);
	
?>


    <div id="page-heading">
        <h1>&Eacute;diter compte utilisateur</h1>
    </div>

    <div class="container"><!-- container -->

        <!-- ======================
           Info générales compte
        =========================== -->

        <div class="row"><!-- row -->
            <div class="col-md-12"><!-- col -->

                <div class="panel panel-midnightblue"><!-- panel -->
                    <div class="panel-body"><!-- panel body -->

                        <div class="row"><!-- row -->
                            <div class="col-md-6"><!-- col -->

                                <div class="row"><!-- row -->
                                    <div class="col-md-9"><!-- col -->
                                        <h3><strong>{{ $custom->format_name($user->prenom) }} {{ $custom->format_name($user->nom) }}</strong></h3>
                                    </div>
                                    <div class="col-md-3 text-right"><!-- col -->

                                        <?php

                                        if($user->activated)
                                        {
                                            $compte = '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                           <i class="fa fa-check-circle"></i>&nbsp; Compte actif&nbsp;
                                                           <span class="caret"></span>
                                                       </button>';
                                        }
                                        else
                                        {
                                            $compte = '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                                           <i class="fa fa-minus-circle"></i>&nbsp; Compte inactif&nbsp;
                                                           <span class="caret"></span>
                                                       </button>';
                                        }

                                        ?>
                                        <div class="btn-group">
                                            <?php echo $compte; ?>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <?php if($user->activated){ ?>
                                                <li><a href="{{ url('admin/users/'.$user->id.'/active') }}">Désactiver le compte</a></li>
                                                <li><a class="open-DialogModal" href="#changeColumn" data-column="username" data-title="Nom d'utilisateur" data-toggle="modal">
                                                    Changer le nom d'utilisateur</a>
                                                </li>
                                                <li><a class="open-DialogModal" href="#changeColumn" data-column="password" data-title="Mot de passe" data-toggle="modal">
                                                    Changer le mot de passe</a>
                                                </li>
                                                <li><a href="{{ url('admin/adresses/user/'.$user->id.'/adresse') }}">Ajouter une adresse</a></li>
                                                <?php } else{ ?>
                                                <li><a href="{{ url('admin/users/'.$user->id.'/active') }}">Activer le compte</a></li>
                                                <?php } ?>
                                                <li class="divider"></li>
                                                <li><a class="deleteAction" data-action="Utilisateur" href="{{ url('admin/users/'.$user->id.'/destroy') }}">
                                                    <small>Supprimer le compte</small></a>
                                                </li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td>Nom d'utilisateur</td><td><a id="username" href="#">{{ $user->username }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td><td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>Compte crée le: </td>
                                                <td><em>{{ $user->created_at->format('d-m-Y') }}</em></td>
                                            </tr>
                                            <tr>
                                                <td>Dernière modification: </td>
                                                <td><em>{{ $user->updated_at->format('d-m-Y') }}</em></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-6">

                            @if($nbr_adresse == 0)
                                <div class="alert alert-dismissable alert-danger">
                                    <h4><strong>Aucune adresse</strong></h4>
                                    <p>Veuillez ajouter un adresse à l'utilisateur pour:</p><br/>
                                    <ul>
                                        <li>Assigner des spécialisation ou une appartenance comme membre.</li>
                                        <li>L'inscrire aux colloques</li>
                                        <li>Permettre les achats sur le shop</li>
                                    </ul>
                                </div>
                            @else

                                <div class="well">

                                    <div id="specs">
                                         <h4>Spécialisations &nbsp;	&nbsp;
                                             <a data-toggle="collapse" data-parent="#specs" href="#addspecs" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
                                         </h4>
                                         <div id="addspecs" class="collapse">

                                            {{ Form::open(array('url' => 'admin/adresses/specialisation' , 'class' => 'form-inline row')) }}
                                              <div class="form-group col-md-10">
                                                <?php echo Form::select('specialisation_id', $allSpecialisations , null , array('class' => 'form-control') ); ?>
                                                <?php echo Form::hidden('user_id', $user->id  );?>
                                                <?php echo Form::hidden('adresse_id', $adresse_id ); ?>
                                              </div>
                                              <div class="col-md-2 text-right"><button type="submit" class="btn btn-info">Ajouter</button></div>
                                            {{ Form::close() }}

                                         </div>
                                    </div>
                                    <?php if( !$specialisations->isEmpty() ){ ?>
                                    <div class="list-group">
                                        <?php
                                            foreach ($specialisations as $spec)
                                            {
                                                echo '<div class="list-group-item">';
                                                    echo Form::open(array('url' => 'admin/adresses/removeSpecialisation'));
                                                    echo $spec->titre;
                                                    echo Form::hidden('specialisation_id', $spec->specialisation_id );
                                                    echo Form::hidden('user_id', $user->id );
                                                    echo Form::hidden('adresse_id', $adresse_id );
                                                    echo '<button type="submit" class="btn btn-xs btn-danger">X</button>';
                                                    echo Form::close();
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="well">

                                    <div id="members">
                                         <h4>Membre de &nbsp; &nbsp;
                                             <a data-toggle="collapse" data-parent="#members" href="#addmembers" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
                                         </h4>
                                         <div id="addmembers" class="collapse">

                                            {{ Form::open(array('url' => 'admin/adresses/membre' , 'class' => 'form-inline row')) }}
                                              <div class="form-group col-md-10">
                                                <?php echo Form::select('membre_id', $allmembres , null , array('class' => 'form-control') ); ?>
                                                <?php echo Form::hidden('user_id', $user->id );?>
                                                <?php echo Form::hidden('adresse_id', $adresse_id ); ?>
                                              </div>
                                              <div class="col-md-2 text-right"><button type="submit" class="btn btn-info">Ajouter</button></div>
                                            {{ Form::close() }}

                                         </div>
                                    </div>
                                <?php

                                if( !$membres->isEmpty() ){ ?>
                                    <div class="list-group">
                                        <?php
                                            foreach ($membres as $membre)
                                            {
                                                echo '<div class="list-group-item">';
                                                    echo Form::open(array('url' => 'admin/adresses/removeMembre'));
                                                    echo $membre->titre;
                                                    echo Form::hidden('member_id', $membre->id );
                                                    echo Form::hidden('user_id', $user->id );
                                                    echo Form::hidden('adresse_id', $adresse_id );
                                                echo '<button type="submit" class="btn btn-xs btn-danger">X</button>';
                                                    echo Form::close();
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>

                                <?php } ?>
                                </div>

                            @endif

                            </div><!-- end col -->

                        </div><!-- end row -->

                    </div><!-- end panel body -->

                </div><!-- end panel -->

            </div><!-- end col -->
        </div><!-- end row -->

        <!-- ===================================
           Inscriptions and books for user
        ======================================== -->

        <div class="row"><!-- row -->
            <div class="col-md-12"><!-- col -->

                @if($nbr_adresse != 0)

                <div class="tab-container tab-info">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#inscriptions">Inscriptions</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#achatshop">Achat shop</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="inscriptions" class="tab-pane active">

                            <p class="text-right"><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp; Ajouter</a></p>

                            @if(!$inscriptions->isEmpty())
                                @foreach($inscriptions as $inscription)

                                    <div class="panel panel-primary">
                                        <div class="panel-body">

                                            <div class="row"><!-- row -->
                                                <div class="col-md-1">
                                                    <?php

                                                        if(isset($vignettes[$inscription->colloques->id]))
                                                        {
                                                            $img      = $vignettes[$inscription->colloques->id];
                                                            $url      = '/files/vignette/'.$img;
                                                            $width    = 70;
                                                            $vignette = $custom->fileExistFormatImage($url,$width);

                                                            echo $vignette;
                                                        }

                                                    ?>
                                                </div>
                                                <div class="col-md-4"><!-- col -->
                                                    <h4><strong>{{ $inscription->colloques->titre }}</strong></h4>
                                                    <dl>
                                                        <dt>Date d'inscription</dt>
                                                        <dd>{{ $inscription->created_at->format('d-m-Y') }}</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-md-2"><!-- col -->
                                                    <h4><span class="label label-info">{{ $inscription->numero }}</span></h4>
                                                    <dl>
                                                        <dt>Prix</dt>
                                                        <dd>{{ $inscription->colloque_prices->remarque }} : {{ $inscription->colloque_prices->price }}</dd>

                                                            @if( !$options->isEmpty() )
                                                            <dt>Options</dt>
                                                                @foreach($options as $option)
                                                                    @if( $option->colloque_id == $inscription->colloques->id )
                                                                        <dd>{{ $option->titre }}</dd>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    </dl>
                                                </div>
                                                <div class="col-md-5"><!-- col -->
                                                    <h4><strong>Documents</strong></h4>
                                                    @if( $docs )
                                                        <div class="text-right btn-group">
                                                        @foreach($docs as $name => $view)
                                                        <?php
                                                            $link = $custom->fileExistFormatLink( '/files/users/', $user->id, $inscription->colloques->id ,$view, $name ,'btn btn-default');
                                                            if($link){ echo $link; }
                                                        ?>
                                                        @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div><!-- end row -->

                                            <div class="row"><!-- row -->
                                                <div class="col-md-12 text-right">
                                                     <div class="btn-group">
                                                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                            Actions &nbsp;<span class="caret"></span>
                                                          </button>
                                                          <ul class="dropdown-menu" role="menu">
                                                            <li><a href="{{ $inscription->id }}">&Eacute;diter</a></li>
                                                            <li><a href="#">Envoyer par email</a></li>
                                                            <li><a href="#">Régénerer docs</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><small>Désinscrire</small></a></li>
                                                          </ul>
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                        </div>
                                    </div>

                                @endforeach

                            @else
                            <p>Pas d'inscriptions</p>
                            @endif

                        </div>
                        <div id="achatshop" class="tab-pane">
                            <p class="text-right"><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp; Ajouter</a></p>
                            <div>
                                <p>Pas d'achats sur le shop</p>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

            </div><!-- end col -->
        </div><!-- end row -->


        <!-- ======================
          Adresses for compte
        =========================== -->

        <div class="row"><!-- row -->

        @foreach ($adresses as $adresse)

            <div class="col-md-<?php echo $col; ?>"><!-- col -->

                <div class="panel panel-sky"><!-- panel -->

                    <div class="panel-body"><!-- panel body -->

                            <div class="row">
                                <div class="col-md-7 margeBottom">
                                    <?php if( $adresse->livraison == 1){  ?>
                                    <p class="text-info"><i class="fa fa-truck"></i> &nbsp;Adresse de livraison</p>
                                    <?php } else { ?>
                                    <p><i class="fa fa-home"></i> &nbsp;Adresse normale</p>
                                    <?php } ?>
                                </div>
                                <div class="col-md-5 text-right">
                                    <div class="btn-group">
                                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-gear"></i> &nbsp;Actions &nbsp;<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                {{ Form::open(array( 'url' => 'admin/adresses/changeLivraison/')) }}

                                                    {{ Form::hidden('livraison', $adresse->livraison) }}
                                                    {{ Form::hidden('id', $adresse->id ) }}
                                                    {{ Form::hidden('user_id', $user->id ) }}

                                                    <?php $text = ($adresse->livraison == 1 ? 'Changer en adresse normale' : 'Changer en adresse de livraison'); ?>

                                                    <button type="submit"><?php  echo $text; ?></button>

                                                {{ Form::close() }}
                                            </li>
                                            <li class="divider"></li>
                                            <li><a class="deleteAction deleteConfirm" data-action="adresse" href="<?php echo url('admin/adresses/delete/'.$adresse->id.'/'.$adresse->user_id); ?>">
                                                <small class="text-danger">Supprimer</small></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Partial adresse form -->
                            @include('admin.adresses.partials.form-edit')

                        </div><!-- end panel body -->
                    </div><!-- end panel -->

                </div><!-- end col -->

        @endforeach

        </div><!-- end row -->

        <!-- Modals for password and username change -->

        <div class="modal fade" id="changeColumn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Changer: <span></span></h4>
                    </div>
                    <div class="modal-body">

                        <div id="alert-error" class="alert alert-dismissable alert-danger" style="display:none;">
                            <strong>Oh snap!</strong> &nbsp;Ce nom d'utilisateur existe déjà
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        </div>

                        <div class="form-group">
                            <label for="newValue" id="valuename"></label>
                            <input type="text" class="form-control" id="newValue">
                            <input type="hidden" id="whatColumn" value="">
                            <input type="hidden" value="<?php echo $user->id; ?>" id="userid">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" id="changeColumnBtn">Envoyer</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- End modals -->
    </div><!-- end container -->


@stop
