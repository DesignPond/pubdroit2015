@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">
				<ol class="breadcrumb">
					<li class="active"><a href="index.htm">Dashboard</a></li>
				</ol>
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