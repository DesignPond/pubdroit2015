@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Prix</li>
				<li class="active">&Eacute;diter</li>
			</ol>
			<h1>Prix</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

					<div class="row">
						<div class="col-sm-8 col-md-offset-2">

                            <!-- messages and errors -->
                            @include('layouts.partials.message')

							<!-- form start --> 
							{{ Form::model($price,array(
								'method' => 'PATCH',
								'id' => 'validate-form',
								'data-validate' => 'parsley',
								'class' => 'form-horizontal',
								'route' => array('admin.pubdroit.price.update',$price->id))) 
							}} 

							<!-- panel start -->
							<div class="panel panel-green">	
						       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> &Eacute;diter</h4></div>
							   <div class="panel-body"><!-- start panel content -->
							
							
									<div class="form-group">
										  <label for="remarque" class="col-sm-3 control-label">Titre du prix</label>
										  <div class="col-sm-6">
										  	 {{ Form::text('remarque', null , array('class' => 'form-control' )) }}
										  </div>
										  <div class="col-sm-3">Requis</div>
									</div>
									
									<div class="form-group">
										  <label for="price" class="col-sm-3 control-label">Prix</label>
										  <div class="col-sm-6">
										  	 {{ Form::text('price', null , array('class' => 'form-control' )) }}
										  </div>
										  <div class="col-sm-3">Requis</div>
									</div>
									
									<div class="form-group">
										  <label for="rang" class="col-sm-3 control-label">Rang du prix</label>
										  <div class="col-sm-6">
										  	 {{ Form::text('rang', null , array('class' => 'form-control' )) }}
										  </div>
										  <div class="col-sm-3"></div>
									</div>
													  		
									<div class="form-group">
										  <label for="type" class="col-sm-3 control-label">Type de prix</label>
										  <div class="col-sm-6">
										  	 {{ Form::select('type', array(1 =>'Prix colloque', 2 =>'Prix spécial (pour administration)'),null, array( 'class' => 'form-control' ) ) }}
										  </div>
										  <div class="col-sm-3">Requis</div>
									</div>
							
							    </div><!-- end panel content -->
							    <div class="panel-footer">
							      	<div class="row">
							      		<div class="col-sm-6 col-sm-offset-3">
							      			<div class="btn-toolbar">
							      				{{ Form::hidden('id', null )}}
							      				{{ Form::hidden('colloque_id', null )}}
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