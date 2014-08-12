@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

			<h1>Option</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

					<div class="row">
						<div class="col-sm-8 col-md-offset-2">

                            <?php
                                echo '<pre>';
                                print_r($options);
                                echo '</pre>';
                            ?>
							
						</div>
					</div>
					
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop