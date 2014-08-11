@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Option</li>
				<li class="active">Créer</li>
			</ol>
			<h1>Option</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

					<div class="row">
						<div class="col-sm-8 col-md-offset-2">

                            <!-- messages and errors -->
                            @include('layouts.partials.message')

							<!-- form start --> 
							{{ Form::open(array(
								'method' => 'POST',
								'id' => 'validate-form',
								'data-validate' => 'parsley',
								'class' => 'form-horizontal',
								'route' => 'admin.option.store'))
							}} 

							<!-- panel start -->
							<div class="panel panel-green">	
						       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Créer</h4></div>
							   <div class="panel-body"><!-- start panel content -->
							
									<div class="form-group">
										  <label for="titre" class="col-sm-3 control-label">Titre de l'option</label>
										  <div class="col-sm-6">
										  	 {{ Form::text('titre', null , array('class' => 'form-control' )) }}
										  </div>
										  <div class="col-sm-3">Requis</div>
									</div>
													  		
									<div class="form-group">
										  <label for="type" class="col-sm-3 control-label">Type d'option</label>
										  <div class="col-sm-6">
										  	 {{ Form::select('type', array('checkbox'=>'checkbox','text'=>'text') , null , array( 'class' => 'form-control' ) ) }}
										  </div>
										  <div class="col-sm-3"></div>
									</div>
							
							    </div><!-- end panel content -->
							    <div class="panel-footer">
							      	<div class="row">
							      		<div class="col-sm-6 col-sm-offset-3">
							      			<div class="btn-toolbar">
							      				{{ Form::hidden('id', null )}}
							      				{{ Form::hidden('colloque_id', $colloque )}}
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
    
	</div>
</div>

@stop