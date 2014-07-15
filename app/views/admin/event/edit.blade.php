@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Colloque</li>
				<li class="active">&Eacute;diter</li>
			</ol>
			<h1>&Eacute;diter un colloque</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	
									
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
					
					<!-- Images et documents -->
					<!-- panel start -->
					<div class="panel panel-primary">
				       <div rel="#images" class="panel-heading event_section"><h4><i class="fa fa-picture-o"></i> &nbsp;Images et documents</h4></div>
					    <div id="images" class="panel-body"><!-- start panel content -->
					    	
							@foreach($documents as $type => $document)
							
								<!-- Documents -->
						    	<div class="row">
								@if( !empty($allfiles[$type]) )
						    		@foreach($document as $doc)						    			
						    			
						    			@if( isset($allfiles[$type][$doc]) )
											<div class="col-sm-3">
											    <div class="panel panel-info">
											    	<div class="panel-body admin-icon-panel">								    		
												    	<span class="admin-panel-{{ $type }}">
												    		@if($type == 'images')
												    		<img src="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" class="admin-icon" alt="icon" />
												    		@else
												    		<img src="{{ asset('images/admin/icons/file.png') }}" alt="icon" />
												    		@endif
												    	</span>
												    	<p><strong>{{ ucfirst($doc) }}</strong></p>
												    	<input class="uploadFile" disabled="disabled" placeholder="{{ $allfiles[$type][$doc]->filename }}">
												    	<div class="btn-group admin-icon-options">
														  	<a class="btn btn-sm btn-danger alone_btn deleteAction" data-action="<?php echo $allfiles[$type][$doc]->filename; ?>" 
														  	href="{{ url('admin/pubdroit/event/'.$allfiles[$type][$doc]->id.'/destroy_file') }}">X</a>
												    	</div>
											    	</div>
											    </div>
											</div>	
						    			@else
											<div class="col-sm-3">
												<div class="panel panel-info">
											    	<div class="panel-body admin-icon-panel">
											    		<p><strong>{{ ucfirst($doc) }}</strong></p>
											    		
											    		{{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
												    	<input class="uploadFile" disabled="disabled" placeholder="">
												    	<input type="hidden" name="destination" value="files/{{ $doc }}/" />
												    	<input type="hidden" name="typeFile" value="{{ $doc }}" />	
												    	<input type="hidden" name="event_id" value="{{ $event->id }}" />				     	
														<div class="btn-group admin-icon-options">
															<div class="fileUpload btn btn-sm btn-primary">
														    	<span>&nbsp;Choisir&nbsp;</span>
														   		<input class="uploadBtn upload" type="file" name="file" />
															</div>
															<button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
														</div>
														{{ Form::close() }}	
														
											    	</div>
											    </div>
											</div>	
						    			@endif
						    																							
									@endforeach
									
								@else
								
									@foreach($document as $doc)						    			
					    				<div class="col-sm-3">
											<div class="panel panel-info">
										    	<div class="panel-body admin-icon-panel">
										    		<p><strong>{{ ucfirst($doc) }}</strong></p>
										    		
										    		{{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
											    	<input class="uploadFile" disabled="disabled" placeholder="">
											    	<input type="hidden" name="destination" value="files/{{ $doc }}/" />
											    	<input type="hidden" name="typeFile" value="{{ $doc }}" />	
											    	<input type="hidden" name="event_id" value="{{ $event->id }}" />				     	
													<div class="btn-group admin-icon-options">
														<div class="fileUpload btn btn-sm btn-primary">
													    	<span>&nbsp;Choisir&nbsp;</span>
													   		<input class="uploadBtn upload" type="file" name="file" />
														</div>
														<button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
													</div>
													{{ Form::close() }}	
													
										    	</div>
										    </div>
										</div>												
									@endforeach																		
								@endif	
								
						    	</div><!-- end row -->
							@endforeach
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->
					
					<!-- Textes email -->
					<!-- panel start -->
					<div class="panel panel-sky">
				       <div rel="#email_event" class="panel-heading event_section"><h4><i class="fa fa-envelope-o"></i> &nbsp;Textes pour email inscription</h4></div>
					    <div id="email_event" class="toggle_in panel-body"><!-- start panel content -->
					    
					    	<?php  $email = ( isset($event->email) ? $event->email : array() ); ?>
					    	
							<!-- form start --> 
							{{ Form::model($email,array(
								'method'        => 'POST',
								'id'            => 'event_email',
								'data-validate' => 'parsley',
								'class'         => 'validate-form-email form-horizontal',
								'url'           => array('admin/pubdroit/event/email'))) 
							}}				
							  
							<div class="form-group">
							  	<label for="message" class="col-sm-3 control-label">Message</label>
							  	<div class="col-sm-6">
							  	
							  		@if(!empty($email))
					      				{{ Form::textarea('message', $email->message , array('class' => 'form-control  redactor required', 'cols' => '50' , 'rows' => '4' )) }}
					      			@else
					      				{{ Form::textarea('message', null , array('class' => 'form-control redactor required', 'cols' => '50' , 'rows' => '4' )) }}
					      			@endif
							  	  	
							  	</div>
							</div>							

							<div class="col-sm-6 col-sm-offset-3 margeBottom">
					      		
					      			@if(!empty($email))
					      				{{ Form::hidden('id', $email->id )}}
					      			@endif
					      			
					      			{{ Form::hidden('typeEmail', 'inscription' )}}
					      			{{ Form::hidden('event_id', $event->id )}}
						      		<button type="submit" class="btn-primary btn">Envoyer</button>
					      	</div>
					      											    					    
					    	@if( !empty($emailDefaut) )
						    	<div class="well col-sm-6 col-sm-offset-3">	
						    		<h3>Texte email par défaut</h3>
						    		<div>{{ $emailDefaut->message }}</div>
						    	</div>	
					    	@endif
						    						  
							{{ Form::close() }}
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->
					
					<!-- Textes Attestation -->
					<!-- panel start -->
					<div class="panel panel-midnightblue">
				       <div rel="#attestation_event" class="panel-heading event_section"><h4><i class="fa fa-envelope-o"></i> &nbsp;Infos pour attestation</h4></div>
					    <div id="attestation_event" class="toggle_in panel-body"><!-- start panel content -->
							
						    <?php  $attestation = ( isset($event->attestation) ? $event->attestation : array() ); ?>											    
							<!-- form start --> 
							{{ Form::open(array(
								'method'        => 'POST',
								'id'            => 'event_attestation',
								'data-validate' => 'parsley',
								'class'         => 'validate-form-attestation form-horizontal',
								'url'           => 'admin/pubdroit/event/attestation' ))
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
					      			
					      			{{ Form::hidden('event_id', $event->id )}}
						      		<button type="submit" class="btn-primary btn">Envoyer</button>
					      		</div>
					      	</div>
	
							{{ Form::close() }}
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->
					
					<!-- Info générales-->
					
					<!-- form start --> 
					{{ Form::model($event,array(
						'method'        => 'PATCH',
						'id'            => 'event_info',
						'data-validate' => 'parsley',
						'class'         => 'validate-form form-horizontal',
						'route'         => array('admin.pubdroit.event.update',$event->id))) 
					}} 

					<!-- panel start -->
					<div class="panel panel-green">
	
				       <div rel="#infos_gen" class="panel-heading event_section"><h4><i class="fa fa-calendar-o"></i> Informations</h4></div>
					   <div id="infos_gen" class="panel-body"><!-- start panel content -->


							<h3>Centres</h3>

							  <div class="form-group">
								  <label for="titre" class="col-sm-3 control-label">Centre organisateurs</label>
								  <div class="col-sm-6">
								  
								  		<?php
								  			
								  			$EventLogos  = ( isset($event->centreLogos) ? $event->centreLogos : '' );
								  			$centerLogos = explode(',', $EventLogos);
									  		
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
				       <div rel="#infos_option" class="panel-heading event_section"><h4><i class="fa fa-flag-o"></i> Prix et Options</h4></div>
					   <div id="infos_option" class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Prix</h3>
							  <p><a href="{{ url('admin/pubdroit/price/create/'.$event->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>
							  
							  <div class="row">
							  	  <div class="col-sm-6 col-md-offset-3">
							  	  
							  	  	  @if ( ! $event->prices->isEmpty() )
							  	  	  
							  	  	  <h4>PRIX COLLOQUES</h4>
							  	  	  
								  	  <div class="panel panel-midnightblue">
										  <div class="panel-body">
											  <ul class="list-group">
											  @foreach($event->prices as $price)
											  		@if($price->typePrice == 1)
											  			<li class="list-group-item">
											  				<div class="row">
											  					<div class="col-sm-3">
														  			<strong>{{ $price->price }} CHF</strong>
														  		</div>
												  				<div class="col-sm-7">
														  			{{ $price->remarquePrice }}
														  		</div>
													  			<div class="col-sm-2 btn-group btn-group-pivot">
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.price.edit',  $price->id ) }}">éditer</a>		
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarquePrice; ?>" href="{{ url('admin/pubdroit/price/'.$price->id.'/delete') }}">X</a>													
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
											  	@foreach($event->prices as $price)
											  		@if($price->typePrice == 2)
											  			<li class="list-group-item">
											  				<div class="row">
											  					<div class="col-sm-3">
														  			<strong>{{ $price->price }} CHF</strong>
														  		</div>
												  				<div class="col-sm-7">
														  			{{ $price->remarquePrice }}
														  		</div>
													  			<div class="col-sm-2 btn-group btn-group-pivot">
														  			<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.price.edit',  $price->id ) }}">éditer</a>		
														  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $price->remarquePrice; ?>" href="{{ url('admin/pubdroit/price/'.$price->id.'/delete') }}">X</a>													
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
							  <p><a href="{{ url('admin/pubdroit/option/create/'.$event->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>
							   
							  <div class="row">
					  	 		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
									  @if ( ! $event->event_options->isEmpty() )
									  	@foreach($event->event_options as $option)
									  		<li class="list-group-item">
									  			<div class="row">
									  				<div class="col-sm-10">
									  					@if($option->typeOption == 'checkbox' )
											  				<i class="fa fa-square-o"></i>
											  			@else
											  				<i class="fa fa-pencil-square-o"></i>
											  			@endif
											  			&nbsp;&nbsp;
											  			<?php echo $option->titreOption; ?>
											  		</div>
										  			<div class="col-sm-2 btn-group btn-group-pivot">
										  				<a class="btn btn-xs btn-orange" href="{{ route('admin.pubdroit.option.edit',  $option->id ) }}">éditer</a>						
														<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $option->titreOption; ?>" href="{{ url('admin/pubdroit/option/'.$option->id.'/delete') }}">X</a>	
													</div>
												</div>
									  		</li>
									  	@endforeach
									  @endif
									  </ul>
								  </div>
							  </div>						  		
							  									  
							  <h3>Spécialisations</h3> 
							  <p><a href="{{ url('admin/pubdroit/specialisation/create/'.$event->id) }}" class="btn btn-sm btn-primary">Ajouter</a></p>
							  
						  	  <div class="row">						  	  
					  	  		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
								  		@if ( ! $event->event_specialisations->isEmpty() )
										  	@foreach($event->event_specialisations as $specialisation)
										  		<li class="list-group-item">
										  			<div class="row">
										  				<div class="col-sm-10">
												  			<i class="fa fa-question-circle"></i>&nbsp;&nbsp;
												  			<?php echo $specialisation->titreSpecialisation; ?>
												  		</div>
											  			<div class="col-sm-2 btn-group btn-group-pivot">
												  			<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $specialisation->titreSpecialisation; ?>" href="{{ url('admin/pubdroit/specialisation/'.$specialisation->pivot->id.'/unlinkEvent') }}">X</a>	
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
							  	  	 {{
							  	  	    Form::select('typeColloque', array(
							  	  	    		'0' => 'Sans Documents', 
							  	  	    		'1' => 'Avec tous les documents / Que Bon',
							  	  	    		'2' => 'Que facture et BV'
							  	  	    	), null , array( 'class' => 'form-control' ) )
							  	  	 }}												  	 
								  	 <p><br/><strong>Avec tous les documents / Que Bon + info BV</strong> = Tous les documents<br/>
								  	  <strong>Avec tous les documents / Que Bon + pas d'info BV</strong> = Que bon</p>								  	  
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