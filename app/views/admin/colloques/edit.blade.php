@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

            <h1>&Eacute;diter un colloque</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">
                <?php
                    echo '<pre>';
                    print_r($colloque);
                    echo '</pre>';
                ?>

                    <!-- messages and errors -->
                    @include('layouts.partials.message')

                    <!-- Images et documents -->
                    @include('admin.colloques.partials.documents')

					<!-- Textes email -->
					<!-- panel start -->
					<div class="panel panel-sky">
				       <div rel="#email_colloque" class="panel-heading colloque_section"><h4><i class="fa fa-envelope-o"></i> &nbsp;Textes pour email inscription</h4></div>
					    <div id="email_colloque" class="toggle_in panel-body"><!-- start panel content -->
					    
					    	<?php  $email = ( isset($colloque->colloque_email) ? $colloque->colloque_email : array() ); ?>

							<!-- form start --> 
							{{ Form::model($email,array(
								'method'        => 'POST',
								'id'            => 'colloque_email',
								'data-validate' => 'parsley',
								'class'         => 'validate-form-email form-horizontal',
								'url'           => array('admin/pubdroit/colloque/email'))) 
							}}				
							  
							<div class="form-group">
							  	<label for="message" class="col-sm-3 control-label">Message</label>
							  	<div class="col-sm-6">
							  	
							  		@if(!empty($email))
					      				{{ Form::textarea('message', $email->message , array('class' => 'form-control  redactor', 'cols' => '50' , 'rows' => '4' )) }}
					      			@else
					      				{{ Form::textarea('message', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
					      			@endif
							  	  	
							  	</div>
							</div>							

							<div class="col-sm-6 col-sm-offset-3 margeBottom">
					      		
                                @if(!empty($email))
                                    {{ Form::hidden('id', $email->id )}}
                                @endif

                                {{ Form::hidden('type', 'inscription' )}}
                                {{ Form::hidden('colloque_id', $colloque->id )}}

                                <button type="submit" class="btn-primary btn">Envoyer</button>

					      	</div>
					      											    					    
					    	@if( !empty($default) )
						    	<div id="defaultEmail" class="col-sm-6 col-sm-offset-3">
						    		<a class="noUnderline" data-toggle="collapse" data-parent="#defaultEmail" href="#emailText">
                                        <i class="fa fa-eye"></i> &nbsp;Texte email par défaut
                                    </a>
						    		<div id="emailText" class="well collapse">{{ $default->message }}</div>
						    	</div>
					    	@endif
						    						  
							{{ Form::close() }}
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->
					
					<!-- Textes Attestation -->
					<!-- panel start -->
					<div class="panel panel-midnightblue">
				       <div rel="#attestation_colloque" class="panel-heading colloque_section"><h4><i class="fa fa-envelope-o"></i> &nbsp;Infos pour attestation</h4></div>
					    <div id="attestation_colloque" class="toggle_in panel-body"><!-- start panel content -->
							
						    <?php  $attestation = ( isset($colloque->colloque_attestations) ? $colloque->colloque_attestations : array() ); ?>
							<!-- form start --> 
							{{ Form::open(array(
								'method'        => 'POST',
								'id'            => 'colloque_attestation',
								'data-validate' => 'parsley',
								'class'         => 'validate-form-attestation form-horizontal',
								'url'           => 'admin/pubdroit/colloque/attestation' ))
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
					      			
					      			{{ Form::hidden('colloque_id', $colloque->id )}}
						      		<button type="submit" class="btn-primary btn">Envoyer</button>
					      		</div>
					      	</div>
	
							{{ Form::close() }}
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->
					
					<!-- Info générales-->
					
					<!-- form start --> 
					{{ Form::model($colloque,array(
						'method'        => 'PATCH',
						'id'            => 'colloque_info',
						'data-validate' => '',
						'class'         => 'form-horizontal',
						'route'         => array('admin.pubdroit.colloque.update',$colloque->id))) 
					}} 

					<!-- panel start -->
					<div class="panel panel-green">
	
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
							  	  <label for="description" class="col-sm-3 control-label">Description</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::textarea('description', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
							  	  </div>
							  </div>
							  
							  <div class="form-group">
							  	  <label for="endroit" class="col-sm-3 control-label">Endroit</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::text('endroit', null , array('class' => 'form-control required' )) }}
							  	  </div>
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
					<div class="panel panel-green">	
				       <div rel="#infos_option" class="panel-heading colloque_section"><h4><i class="fa fa-flag-o"></i> Prix et Options</h4></div>
					   <div id="infos_option" class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Prix</h3>
							  <p><a href="{{ url('admin/pubdroit/price/create/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>
							  
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
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.price.edit',  $price->id ) }}">éditer</a>		
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarque; ?>" href="{{ url('admin/pubdroit/price/'.$price->id.'/delete') }}">X</a>
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
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.price.edit',  $price->id ) }}">éditer</a>		
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarque; ?>" href="{{ url('admin/pubdroit/price/'.$price->id.'/delete') }}">X</a>
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
							  <p><a href="{{ url('admin/pubdroit/option/create/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>

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
										  				<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.option.edit',  $option->id ) }}">éditer</a>						
														<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $option->titre; ?>" href="{{ url('admin/pubdroit/option/'.$option->id.'/delete') }}">X</a>
													</div>
												</div>
									  		</li>
									  	@endforeach
									  @endif
									  </ul>
								  </div>
							  </div>						  		
							  									  
							  <h3>Spécialisations</h3>
							  <p><a href="{{ url('admin/pubdroit/specialisation/addToColloque/'.$colloque->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>

						  	  <div class="row">
					  	  		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
								  		@if ( ! $colloque->colloque_specialisations->isEmpty() )
										  	@foreach($colloque->colloque_specialisations as $specialisation)
										  		<li class="list-group-item">
										  			<div class="row">
										  				<div class="col-sm-10">
												  			<i class="fa fa-question-circle"></i>&nbsp;&nbsp;
												  			<?php echo $specialisation->titreSpecialisation; ?>
												  		</div>
											  			<div class="col-sm-2 btn-group btn-group-pivot">
												  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $specialisation->titreSpecialisation; ?>" href="{{ url('admin/pubdroit/specialisation/'.$specialisation->pivot->id.'/unlinkColloque') }}">X</a>	
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
					<div class="panel panel-green">	
				       <div class="panel-heading"><h4><i class="fa fa-gears"></i> Configuration</h4></div>
					   <div class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Documents</h3>

							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Compte pour BV</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::select('compte_id', $comptes , null , array( 'class' => 'form-control required' ) ) }}
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
    
	</div>
</div>

@stop