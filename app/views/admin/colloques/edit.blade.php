@extends('layouts.admin')
@section('content')

		<div id="page-heading">
            <h1>&Eacute;diter <small>{{ $colloque->titre }}</small></h1>
            <div class="options">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/colloque/attestation/'.$colloque->id) }}" class="btn btn-indigo"><i class="fa fa-certificate"></i> &nbsp;Configuration attestation</a>
                    <a href="{{ url('admin/colloque/email/'.$colloque->id) }}" class="btn btn-orange"><i class="fa fa-envelope-o"></i> &nbsp;Configuration email</a>
                    <a href="{{ url('admin/inscription/colloque/'.$colloque->id) }}" class="btn btn-midnightblue"><i class="fa fa-calendar"></i> &nbsp;Inscriptions</a>
                    <a href="{{ url('admin/inscription/colloque/'.$colloque->id) }}" class="btn btn-green"><i class="fa fa-credit-card"></i> &nbsp;Factures</a>
                </div>
            </div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">

                    <!-- Images et documents -->
                    @include('admin.colloques.partials.documents')
					
					<!-- Info générales-->
					
					<!-- form start --> 
					{{ Form::model($colloque,array(
						'method'        => 'PATCH',
						'id'            => 'colloque_info',
						'data-validate' => 'parsley',
						'class'         => 'form-horizontal',
						'route'         => array('admin.colloque.update',$colloque->id)))
					}} 

					<!-- panel start -->
					<div class="panel panel-info">
	
				       <div rel="#infos_gen" class="panel-heading colloque_section"><h4><i class="fa fa-calendar-o"></i> Informations</h4></div>
					   <div id="infos_gen" class="panel-body"><!-- start panel content -->

							<h3>Centres</h3>

							  <div class="form-group">
								  <label for="titre" class="col-sm-3 control-label">Centre organisateurs</label>
								  <div class="col-sm-6">
								  
								  		<?php
								  			
								  			$ColloqueLogos  = ( isset($colloque->centres) ? $colloque->centres : '' );
								  			$centerLogos = explode(',', $ColloqueLogos);
									  		
											if(!empty($centers)){
												foreach($centers as $center){
													echo '<div class="checkbox block"><label><input name="centres[]" value="'.$center.'" type="checkbox" ';
													if( in_array($center, $centerLogos)){ echo 'checked'; }
													echo ' >'.$center.'</label></div>';
												}
											}	
										?>

								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
					    
							<h3>Général</h3>
							  <div class="form-group">
								  <label for="organisateur" class="col-sm-3 control-label">Organisateur</label>
								  <div class="col-sm-6">
								      {{ Form::text('organisateur', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="titre" class="col-sm-3 control-label">Titre</label>
								  <div class="col-sm-6">
								      {{ Form::text('titre', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="soustitre" class="col-sm-3 control-label">Sous-titre</label>
								  <div class="col-sm-6">
								      {{ Form::text('soustitre', null , array('class' => 'form-control' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block"></p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="sujet" class="col-sm-3 control-label">Sujet</label>
								  <div class="col-sm-6">
								      {{ Form::text('sujet', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>							  							  							

							  <div class="form-group">
							  	  <label for="endroit" class="col-sm-3 control-label">Endroit</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::text('endroit', null , array('class' => 'form-control required')) }}
							  	  </div>
                                  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
							  
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Date de début</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDebut', null ,array('class' => 'form-control datepicker required', 'id' => 'dateDebut' )) }}
					               </div>
					          </div>	
					          
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Date de fin</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateFin', null , array('class' => 'form-control datepicker required', 'id' => 'dateFin' )) }}
					               </div>
					          </div>							          					  							  
							  
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Délai d'inscription</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDelai', null , array('class' => 'form-control datepicker required', 'id' => 'dateDelai' )) }}
					               </div>
					          </div>				          

							  <div class="form-group">
							  	  <label for="remarques" class="col-sm-3 control-label">Remarques</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::textarea('remarques', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
							  	  </div>
							  </div>
					    </div>
					</div><!-- end panel -->

					<!-- panel start -->
					<div class="panel panel-info">	
				       <div rel="#infos_option" class="panel-heading colloque_section"><h4><i class="fa fa-flag-o"></i> Prix et Options</h4></div>
					   <div id="infos_option" class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Prix</h3>
							  <p><a href="{{ url('admin/price/create/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>
							  
							  <div class="row">
							  	  <div class="col-sm-6 col-md-offset-3">
							  	  
							  	  	  @if ( ! $colloque->colloque_prices->isEmpty() )
							  	  	  
							  	  	  <h4>PRIX COLLOQUES</h4>
							  	  	  
								  	  <div class="panel panel-midnightblue">
										  <div class="panel-body">
											  <ul class="list-group">
											  @foreach($colloque->colloque_prices as $price)
											  		@if($price->type == 1)
											  			<li class="list-group-item">
											  				<div class="row">
											  					<div class="col-sm-3">
														  			<strong>{{ $price->price }} CHF</strong>
														  		</div>
												  				<div class="col-sm-7">
														  			{{ $price->remarque }}
														  		</div>
													  			<div class="col-sm-2 btn-group btn-group-pivot">
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.price.edit',  $price->id ) }}">éditer</a>
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarque; ?>" href="{{ url('admin/price/'.$price->id.'/delete') }}">X</a>
																</div>
															</div>
											  			</li>
												  	@endif
												@endforeach											  
												</ul>
										  </div>
								  	  </div>
								  	  					
								  	  <h4>PRIX SPÉCIAUX ( pour administration )</h4>
								  	  
								  	  <div class="panel panel-orange">
										  <div class="panel-body">
											  <ul class="list-group">
											  	@foreach($colloque->colloque_prices as $price)
											  		@if($price->type == 2)
											  			<li class="list-group-item">
											  				<div class="row">
											  					<div class="col-sm-3">
														  			<strong><?php echo ($price->price ? $price->price : '0'); ?> CHF</strong>
														  		</div>
												  				<div class="col-sm-7">
														  			{{ $price->remarque }}
														  		</div>
													  			<div class="col-sm-2 btn-group btn-group-pivot">
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.price.edit',  $price->id ) }}">éditer</a>
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarque; ?>" href="{{ url('admin/price/'.$price->id.'/delete') }}">X</a>
																</div>
															</div>
											  			</li>
												  	@endif
												@endforeach
											  </ul>
										  </div>
								  	  </div>
								  	  
								  	  @endif
								  	  
							  	  </div>				
							  </div>

							  <h3><a name="option">Options</a></h3>
							  <p><a href="{{ url('admin/option/create/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>

							  <div class="row">
					  	 		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
									  @if ( ! $colloque->colloque_options->isEmpty() )


									  	@foreach($colloque->colloque_options as $option)
									  		<li class="list-group-item">
									  			<div class="row">
									  				<div class="col-sm-10">
									  					@if($option->type == 'checkbox' )
											  				<i class="fa fa-square-o"></i>
											  			@else
											  				<i class="fa fa-pencil-square-o"></i>
											  			@endif
											  			&nbsp;&nbsp;
											  			<?php echo $option->titre; ?>
											  		</div>
										  			<div class="col-sm-2 btn-group btn-group-pivot">
										  				<a class="btn btn-xs btn-orange" href="{{ route('admin.option.edit',  $option->id ) }}">éditer</a>
														<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $option->titre; ?>" href="{{ url('admin/option/'.$option->id.'/delete') }}">X</a>
													</div>
												</div>
									  		</li>
									  	@endforeach
									  @endif
									  </ul>
								  </div>
							  </div>						  		
							  									  
							  <h3>Spécialisations</h3>
							  <p><a href="{{ url('admin/specialisation/addToColloque/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>

						  	  <div class="row">
					  	  		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
								  		@if ( ! $colloque->colloque_specialisations->isEmpty() )
										  	@foreach($colloque->colloque_specialisations as $specialisation)
										  		<li class="list-group-item">
										  			<div class="row">
										  				<div class="col-sm-10">
												  			<i class="fa fa-question-circle"></i>&nbsp;&nbsp;
												  			<?php echo $specialisation->titre; ?>
												  		</div>
											  			<div class="col-sm-2 btn-group btn-group-pivot">
												  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $specialisation->titre; ?>" href="{{ url('admin/colloque/removeSpecialisation/'.$specialisation->id.'/'.$colloque->id) }}">X</a>
														</div>
													</div>
										  		</li>
										  	@endforeach							  		
								  		@endif
									  </ul>
								  </div>
							  </div>
							  	
					    </div><!-- end panel content -->

					</div><!-- end panel -->

					<!-- panel start -->
					<div class="panel panel-info">	
				       <div class="panel-heading"><h4><i class="fa fa-gears"></i> Configuration</h4></div>
					   <div class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Documents</h3>

							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Compte pour BV</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::select('compte_id', $comptes , null , array( 'class' => 'form-control') ) }}
							  	  </div>
							  	  <div class="col-sm-3"><p class="help-block">Requis si génération du BV</p></div>
							  </div>	
							  
							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Choisir si génération factures et emails</label>
							  	  <div class="col-sm-6">

                                      <div class="radio">
                                          <label>
                                              {{ Form::radio('type', 1 , ($colloque->type == 1 ? true : false)) }}Avec tous les documents
                                          </label>
                                      </div>

                                      <div class="radio">
                                          <label>{{ Form::radio('type', 3,($colloque->type == 3 ? true : false) ) }}Que Bon</label>
                                      </div>

                                      <div class="radio">
                                          <label>{{ Form::radio('type', 2,($colloque->type == 2 ? true : false) ) }}Que facture et BV</label>
                                      </div>

                                      <div class="radio">
                                          <label>{{ Form::radio('type', 0,($colloque->type == 0 ? true : false) ) }}Sans Documents</label>
                                      </div>

							  	  </div>
							  	  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>						
							  
							  <h3>Visibilité</h3>
							  
							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Visible</label>
							  	  <div class="col-sm-6">
							  	  	 {{
							  	  	    Form::select('visible', array(
							  	  	    		'0' => 'Non Visible', 
							  	  	    		'1' => 'Visible'
							  	  	    	), null , array( 'class' => 'form-control' ) )
							  	  	 }}												  	 						  	  
							  	  </div>
							  </div>	
							
							<!-- form end --> 
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

@stop