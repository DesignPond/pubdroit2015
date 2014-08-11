@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

            <h1>Profession</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/profession/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">

                    <!-- messages and errors -->
                    @include('layouts.partials.message')
					

				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop

