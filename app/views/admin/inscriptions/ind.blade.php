@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li class="active">Inscription</li>
			</ol>
			<h1>Inscription</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/pubdroit/inscription/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	

                    <?php
                    echo $file;

                    if( File::exists('/Applications/MAMP/htdocs/pubdroit2015/public/test/users/1/pdfbon_4-1.pdf') ){
                        //echo 'exist';
                    }

                    ?>
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop