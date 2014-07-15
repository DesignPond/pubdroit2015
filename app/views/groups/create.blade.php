@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="index.htm">Dashboard</a></li>
				<li class="active"><a href="index.htm">Groupes</a></li>
			</ol>
			<h1>Groupes</h1>
		</div>
		<div class="container">

			<div class="row">
			    <div class="col-md-4 col-md-offset-4">
				{{ Form::open(array('action' => 'GroupController@store')) }}
			        <h2>Create New Group</h2>
			    
			        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
			            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
			            {{ ($errors->has('name') ? $errors->first('name') : '') }}
			        </div>
			
			        {{ Form::label('Permissions') }}
			        <div class="form-group">
			            <label class="checkbox-inline">
			                {{ Form::checkbox('adminPermissions', 1) }} Admin
			            </label>
			            <label class="checkbox-inline">
			                {{ Form::checkbox('userPermissions', 1) }} User
			            </label>
			
			        </div>
			
			        {{ Form::submit('Create New Group', array('class' => 'btn btn-primary')) }}
			
			    {{ Form::close() }}
			    </div>
			</div>
			
		</div>
	</div>
</div>   	

@stop