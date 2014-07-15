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
				{{ Form::open(array('action' =>  array('GroupController@update', $group->id), 'method' => 'put')) }}
			        <h2>Edit Group</h2>
			    
			        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
			            {{ Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => 'Name')) }}
			            {{ ($errors->has('name') ? $errors->first('name') : '') }}
			        </div>
			
			        {{ Form::label('Permissions') }}
			        <?php 
			            $permissions = $group->getPermissions(); 
			            if (!array_key_exists('admin', $permissions)) $permissions['admin'] = 0;
			            if (!array_key_exists('users', $permissions)) $permissions['users'] = 0;
			        ?>
			        
			        <div class="form-group">
			            <label class="checkbox-inline">
			                {{ Form::checkbox('adminPermissions', 1, $permissions['admin'] ) }} Admin
			            </label>
			            <label class="checkbox-inline">
			                {{ Form::checkbox('userPermissions', 1, $permissions['users'] ) }} Users
			            </label>
			        </div>
			
			        {{ Form::hidden('id', $group->id) }}
			        {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
			
			    {{ Form::close() }}
			    </div>
			</div>

		</div>
	</div>
</div>   	

@stop