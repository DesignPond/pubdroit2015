@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
		
			<div id="page-heading">

                <!-- Breadcrumbs  -->
                @include('layouts.partials.admin.breadcrumb')

                <h1>Colloques - {{ $title }}</h1>
				<div class="options">
		            <div class="btn-toolbar">
                        @if(!$archive)
		                    <a href="{{ url('admin/colloque/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
                        @endif
		            </div>
				</div>
			</div>
			
			<div class="container">

	        	<!-- start row -->

	            <div class="row">
	            				
				@if ( !empty($colloques) )
					@foreach($colloques as $colloque)

                    <?php $color = ($archive ? 'orange': 'info'); ?>

					<div class="col-md-6">
					    <div class="panel panel-{{ $color }}">
						    <div class="panel-heading">
						    	<h4><i class="fa fa-calendar icon-highlight icon-highlight-default"></i> {{ $colloque->titre }}</h4>
						    </div>
						    <div class="panel-body colloque-info">
							    <p>{{ $colloque->organisateur }}</p>
 
							    <p><strong>Date:</strong> {{ Custom::formatDate( $colloque->dateDebut ) }}</p>
						    </div>
						    <div class="panel-footer mini-footer ">
						    	<div class="btn-group">
									<a class="btn btn-sm btn-info" href="{{ url('admin/colloque/'.$colloque->id.'/edit') }}">&Eacute;diter 
										<span class="badge blank">42</span>
									</a>
									<a class="btn btn-sm btn-success" href="{{ url('admin/inscription/colloque/'.$colloque->id) }}">Inscriptions 
										<span class="badge blank">42</span>
									</a>
									<a class="btn btn-sm btn-primary" href="{{ url('admin/invoice/colloque/'.$colloque->id) }}">Factures <span class="badge blank">42</span></a>
								</div>
							</div>
					    </div>
	            	</div>
						                        
					@endforeach
				@endif 
	            
	            </div> 
	            <!-- end row -->

			</div><!-- end container -->
			
		</div>
	</div>
	
    	
@stop