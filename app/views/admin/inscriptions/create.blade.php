@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Inscription</li>
				<li class="active">Ajouter</li>
			</ol>
			<h1>Inscription</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

					<div class="row">
						<div class="col-sm-6 col-md-offset-3">

                            @include('layouts.partials.message')

							<!-- form start --> 
							{{ Form::open(array(
								'method' => 'POST',
								'id' => 'validate-form',
								'data-validate' => 'parsley',
								'class' => 'form-horizontal',
								'route' => 'admin.pubdroit.inscription.store'))
							}} 

							<!-- panel start -->
							<div class="panel panel-green">	
						       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Nouvelle inscription</h4></div>
							   <div class="panel-body"><!-- start panel content -->

                                   <div class="form-group">
                                       <label for="colloque_price_id" class="col-sm-3 control-label">Prix colloque</label>
                                       <div class="col-sm-6">
                                           {{ Form::text('colloque_price_id', 8 , array('class' => 'form-control' )) }}
                                       </div>
                                       <div class="col-sm-3">Requis</div>
                                   </div>

                                   <div class="form-group">
                                       <label for="colloque_id" class="col-sm-3 control-label">Colloque</label>
                                       <div class="col-sm-6">
                                           {{ Form::text('colloque_id',3 , array('class' => 'form-control' )) }}
                                       </div>
                                       <div class="col-sm-3">Requis</div>
                                   </div>

                                   <div class="form-group">
                                       <label for="user_id" class="col-sm-3 control-label">User</label>
                                       <div class="col-sm-6">
                                           {{ Form::text('user_id', 1 , array('class' => 'form-control' )) }}
                                       </div>
                                       <div class="col-sm-3">Requis</div>
                                   </div>

							    </div><!-- end panel content -->
							    <div class="panel-footer">
							      	<div class="row">
							      		<div class="col-sm-6">
							      			<div class="btn-toolbar">
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