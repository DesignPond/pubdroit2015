@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

            <h1>Membre</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/membre/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">

                    <!-- messages and errors -->
                    @include('layouts.partials.message')
					
					@foreach($membres as $membre)
					
					<div class="membre">
						<h3><strong>{{ $membre->titre }}</strong></h3>
						<div class="btn-group-vertical membre-btn">
							<a class="btn btn-xs btn-orange" href="{{ url('admin/membre/'.$membre->id.'/edit') }}">&eacute;diter</a>
							<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $membre->titre; ?>" href="{{ url('admin/membre/'.$membre->id.'/delete') }}">X</a>
						</div>
					</div>
					
					@endforeach
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop

