@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">

            <!-- Breadcrumbs  -->
            @include('layouts.partials.admin.breadcrumb')

            <h1>Inscription</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/inscription/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

                    <?php


                    ?>
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop