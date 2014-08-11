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
			
			@if($errors->has())				
				<ul>
				    @foreach($errors->all() as $message)						
				    <li>{{ $message }}</li>						
				    @endforeach
				</ul>						
			@endif
			
			@if(Session::has('status'))
			<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
				@if(Session::has('message'))
					{{  Session::get('message') }}
				@endif
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			</div>
			@endif
			
			<div class="row"><!-- row -->
				<div class="col-md-6"><!-- col -->		

					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->

								@if( !empty($adresse) )
								
								{{ Form::open(array( 'url' => 'admin/adresses/'.$adresse->id , 'method' => 'PUT' )) }}
									
									<h3><strong><?php echo $custom->whatType($adresse->type); ?></strong></h3>						

										<div class="form-group row">
										 	 <label for="civilite" class="col-sm-3 control-label">Civilite</label>
										 	 <div class="col-sm-6">	
												{{ Form::select('civilite', $civilites , $adresse->civilite_id , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>								 

										<div class="form-group row">
										 	 <label for="prenom" class="col-sm-3 control-label">Prénom</label>
										 	 <div class="col-sm-6">
												{{ Form::text('prenom', $custom->format_name($adresse->prenom) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="nom" class="col-sm-3 control-label">Nom</label>
										 	 <div class="col-sm-6">
												{{ Form::text('nom', $custom->format_name($adresse->nom) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="email" class="col-sm-3 control-label">Email</label>
										 	 <div class="col-sm-6">
												{{ Form::text('email', $adresse->email , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="entreprise" class="col-sm-3 control-label">Entreprise</label>
										 	 <div class="col-sm-6">
												{{ Form::text('entreprise', $adresse->entreprise , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>										
										
										<div class="form-group row">
										 	 <label for="profession" class="col-sm-3 control-label">Profession</label>
										 	 <div class="col-sm-6">
												{{ Form::select('profession', $professions , $adresse->profession_id , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="fonction" class="col-sm-3 control-label">Fonction</label>
										 	 <div class="col-sm-6">
												{{ Form::text('fonction', $adresse->fonction , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>											
										
										<div class="form-group row">
										 	 <label for="telephone" class="col-sm-3 control-label">Téléphone</label>
										 	 <div class="col-sm-6">
												{{ Form::text('telephone', $adresse->telephone , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
																				
										<div class="form-group row">
										 	 <label for="mobile" class="col-sm-3 control-label">Mobile</label>
										 	 <div class="col-sm-6">
												{{ Form::text('mobile', $adresse->mobile , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
																				
										<div class="form-group row">
										 	 <label for="fax" class="col-sm-3 control-label">Fax</label>
										 	 <div class="col-sm-6">
												{{ Form::text('fax', $adresse->fax , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
																		
										<div class="form-group row">
										 	 <label for="adresse" class="col-sm-3 control-label">Adresse</label>
										 	 <div class="col-sm-6">
												{{ Form::text('adresse', $adresse->adresse , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="complement" class="col-sm-3 control-label">Complément d'adresse</label>
										 	 <div class="col-sm-6">
												{{ Form::text('complement', $adresse->complement , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
																				
										<div class="form-group row">
										 	 <label for="cp" class="col-sm-3 control-label">Case postale</label>
										 	 <div class="col-sm-6">
												{{ Form::text('cp', $adresse->cp , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="npa" class="col-sm-3 control-label">NPA</label>
										 	 <div class="col-sm-6">
												{{ Form::text('npa', $adresse->npa , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="ville" class="col-sm-3 control-label">Ville</label>
										 	 <div class="col-sm-6">
												{{ Form::text('ville', $adresse->ville , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>																					

										<div class="form-group row">
										 	 <label for="canton" class="col-sm-3 control-label">Canton</label>
										 	 <div class="col-sm-6">
												{{ Form::select('canton', $cantons , $adresse->canton_id , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	

										<div class="form-group row">
										 	 <label for="pays" class="col-sm-3 control-label">Pays</label>
										 	 <div class="col-sm-6">
												{{ Form::select('pays', $pays , $adresse->pays_id , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>																			

						</div><!-- end panel body -->
						
						<div class="panel-footer">
					      	<div class="row">
				      			<div class="btn-toolbar">
					      			{{ Form::hidden('user_id', $adresse->user_id ) }}
					      			{{ Form::hidden('type', $adresse->type ) }}	
					      			{{ Form::hidden('id', $adresse->id ) }}	
					      			<button type="submit" class="btn-primary btn">Envoyer</button>
				      			</div>
					      	</div>
					    </div>
					    
						{{ Form::close() }}	
						
						@endif	
							
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
									 			echo Form::hidden('id', $spec->idspec );
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
									 			echo Form::hidden('id', $membre->idmem );
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
