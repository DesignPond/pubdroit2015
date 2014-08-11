@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

            <h1>&Eacute;diter adresse</h1>
		</div>
		
		<div class="container"><!-- container -->
					
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->	
					<?php if( isset($adresse->user_id) && ($adresse->user_id > 0) ){ ?>
						<p><a class="btn btn-default" href="{{ url('admin/users') }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>				
					<?php } else { ?>
						<p><a class="btn btn-default" href="{{ url('admin/adresses') }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>				
					<?php } ?>	
				</div>
			</div>

        <!-- messages and errors -->
        @include('layouts.partials.message')
			
			<div class="row"><!-- row -->
				<div class="col-md-6"><!-- col -->		

					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->

							@if( !empty($adresse) )

                                @include('admin.adresses.partials.form-edit')
						
						    @endif

                        </div><!-- end panel body -->
							
					</div><!-- end panel -->
					
					</div><!-- end col -->	
					
					<div class="col-md-6"><!-- col -->
					
					<?php if( isset($adresse->user_id) && ($adresse->user_id > 0) ){ ?>

					<!-- If is a user adresse -->
					<div class="panel panel-danger"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
								
							<h3><strong>Lié au compte</strong></h3>
					
							<table class="table table-condensed">
								<h4><strong>{{ $adresse->user->prenom }} {{ $adresse->user->nom }}</strong></h4>
								<tbody>
									<tr>
										<td>Email</td><td><a href="mailto:{{ $adresse->user->email }}">{{ $adresse->user->email }}</a></td>
									</tr>
									<tr>
										<td>Compte crée le: </td>
										<td><em>{{ $adresse->user->created_at->format('d-m-Y') }}</em></td>
									</tr>
									<tr>
										<td>Dernière modification: </td>
										<td><em>{{ $adresse->user->updated_at->format('d-m-Y') }}</em></td>
									</tr>
								</tbody>
							</table>									 																									

						</div><!-- end panel body -->
					</div><!-- end panel -->
					<?php } ?>	
					
					@if( !empty($adresse) )
					<!-- Membres et specialisations -->
					<div class="panel panel-warning"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
								
							<div class="well">
								
								<div id="specs">
									 <h4>Spécialisations &nbsp;	&nbsp;											 
										 <a data-toggle="collapse" data-parent="#specs" href="#addspecs" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
									 </h4>
									 <div id="addspecs" class="collapse">
									 
										{{ Form::open(array('url' => 'admin/adresses/specialisation' , 'class' => 'form-inline row')) }}
										  <div class="form-group col-md-10">
											<?php echo Form::select('specialisation_id', $allSpecialisations , null , array('class' => 'form-control') ); ?>
											<?php echo Form::hidden('adresse_id', $adresse->id ); ?>	
											<?php 
												if( isset($adresse->user_id) && ($adresse->user_id > 0) ){ 
													echo Form::hidden('user_id', $adresse->user_id );
												}
											?>							
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
									 			echo Form::hidden('user_id', $adresse->user_id );
									 			echo Form::hidden('adresse_id', $adresse->id );
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
											<?php echo Form::hidden('adresse_id', $adresse->id ); ?>		
											<?php 
												if( isset($adresse->user_id) && ($adresse->user_id > 0) ){ 
													echo Form::hidden('user_id', $adresse->user_id );
												}
											?>																					
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
									 			echo Form::hidden('id', $membre->membre_id );
									 			echo Form::hidden('user_id', $adresse->user_id );
									 			echo Form::hidden('adresse_id', $adresse->id );
									 			echo '<button type="submit" class="btn btn-xs btn-danger">X</button>';
									 			echo Form::close();
									 		echo '</div>';
								 		} 
								 	?>
								</div>
								
							<?php } ?>																			 
							</div>  									 

						</div><!-- end panel body -->
					</div><!-- end panel -->
					@endif
				</div><!-- end col -->

			</div><!-- end row -->

			
		</div><!-- end container -->		
	</div><!-- end wrap -->
</div><!-- end page-content -->

@stop
