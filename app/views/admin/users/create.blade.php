@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Utilisateur</a></li>
			</ol>
			<h1>Ajouter compte utilisateur</h1>
		</div>
		
		<div class="container"><!-- container -->		
			
			<!-- ====================== 
			   Info générales compte	
			=========================== -->
			
			<div class="row"><!-- row -->
				<div class="col-md-offset-2 col-md-8"><!-- col -->
				
					@if($errors->has())				
						<div class="alert alert-dismissable alert-danger">
						    @foreach($errors->all() as $message)						
						    <p>{{ $message }}</p>						
						    @endforeach
						</div>						
					@endif
				
					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
				
						        {{ Form::open(array('action' => 'UserController@store')) }}
						        
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
						                	{{ Form::text('email', null, array('class' => 'form-control required', 'id' => 'UsernameEmail' , 'placeholder' => 'E-mail')) }}
						                	{{ Form::hidden('username', null, array( 'id' => 'inputUsername' )) }}
						                </div>
						                <div class="col-sm-3"><p class="help-block">Requis</p></div>
						            </div>
						
						            <div class="form-group row">
						            	<label for="password" class="col-sm-3 control-label">Mot de passe</label>
						                <div class="col-sm-6">
						                	{{ Form::password('password', array('class' => 'form-control required', 'placeholder' => 'Password')) }}
						                </div>
						                <div class="col-sm-3"><p class="help-block">Requis</p></div>
						            </div>
						
						            <div class="form-group row">
						           		<label for="password_confirm" class="col-sm-3 control-label">Confirmation du mot de passe</label>
						                <div class="col-sm-6">
						                	{{ Form::password('password_confirm', array('class' => 'form-control required', 'placeholder' => 'Confirmation du mot de passe')) }}
						                </div>
						                <div class="col-sm-3"><p class="help-block">Requis</p></div>
						            </div>
								
									<div class="panel-footer"><!-- start panel footer -->			      	
							      		<div class="text-right">
								      		<button type="submit" class="btn-primary btn">Envoyer</button>
							      		</div>								      		
								    </div><!-- end panel footer -->
						            
						        {{ Form::close() }}
							
						</div><!-- end panel body -->
					</div><!-- end panel -->
			        						
				</div><!-- end col -->
			</div><!-- end row -->	
    
		</div><!-- end container -->		
	</div><!-- end wrap -->
</div><!-- end page-content -->

@stop