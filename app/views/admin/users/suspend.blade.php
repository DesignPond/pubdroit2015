@extends('layouts.default')

@section('content')

<div class="verticalcenter">

	<div class="row">
	    <div class="col-md-10 col-md-offset-2">
	        {{ Form::open(array('action' => array('UserController@suspend', $id), 'method' => 'post')) }}
	 
	            <h2>Suspend User</h2>
	
	            <div class="form-group {{ ($errors->has('minutes')) ? 'has-error' : '' }}">
	                {{ Form::text('minutes', null, array('class' => 'form-control', 'placeholder' => 'Minutes', 'autofocus')) }}
	                {{ ($errors->has('minutes') ? $errors->first('minutes') : '') }}
	            </div>    	   
	
	            {{ Form::hidden('id', $id) }}
	
	            {{ Form::submit('Suspend User', array('class' => 'btn btn-primary')) }}
	            
	        {{ Form::close() }}
	    </div>
	</div>
	
</div>

@stop