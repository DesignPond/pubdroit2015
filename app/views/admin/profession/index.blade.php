@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li class="active">Profession</li>
			</ol>
			<h1>Profession</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/pubdroit/profession/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	
										
				   @if($errors->has())
						We encountered the following errors:						
						<ul>
						    @foreach($errors->all() as $message)						
						    <li>{{ $message }}</li>						
						    @endforeach
						</ul>						
					@endif
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					</div>
					@endif
					
					@foreach($professions as $profession)
					
					<div class="profession">
						<h3><strong>{{ $profession->titreProfession }}</strong></h3>
						<div class="btn-group-vertical profession-btn">
							<a class="btn btn-xs btn-orange" href="{{ url('admin/pubdroit/profession/'.$profession->id.'/edit') }}">&eacute;diter</a>
							<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $profession->titreProfession; ?>" href="{{ url('admin/pubdroit/profession/'.$profession->id.'/delete') }}">X</a>
						</div>
					</div>
					
					@endforeach
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop

