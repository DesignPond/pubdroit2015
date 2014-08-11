@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">

                <!-- Breadcrumbs  -->
                @include('layouts.partials.admin.breadcrumb')

                <h1>Dashboard</h1>
			</div>
			<div class="container">
			
				<!-- row -->
					<div class="row">
		                <div class="col-md-12">
		                <?php
							echo '<pre>';
							print_r($event);
							echo '</pre>';
						?>
						
		                </div>
		            </div>
		        <!-- end row -->

			</div>
		</div>
	</div>
    	
@stop