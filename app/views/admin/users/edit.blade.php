@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>Dashboard</h1>
		</div>
		
		<div class="container">
		
		  <div class="row">
	          <div class="col-md-12">
	              <div class="panel panel-sky">
                
	                    <div class="panel-heading">
							<h4>éditer</h4>
	                    </div>
	                    
	                    <div class="panel-body collapse in">
	                    
							<div class="well">
								{{ Form::open(array(
							        'action' => array('UserController@update', $user->id), 
							        'method' => 'put',
							        'class' => 'form-horizontal', 
							        'role' => 'form'
							        )) }}
							        
							        <div class="form-group {{ ($errors->has('firstName')) ? 'has-error' : '' }}" for="firstName">
							            {{ Form::label('edit_firstName', 'First Name', array('class' => 'col-sm-2 control-label')) }}
							            <div class="col-sm-10">
							              {{ Form::text('firstName', $user->first_name, array('class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'edit_firstName'))}}
							            </div>
							            {{ ($errors->has('firstName') ? $errors->first('firstName') : '') }}    			
							    	</div>
							
							
							        <div class="form-group {{ ($errors->has('lastName')) ? 'has-error' : '' }}" for="lastName">
							            {{ Form::label('edit_lastName', 'Last Name', array('class' => 'col-sm-2 control-label')) }}
							            <div class="col-sm-10">
							              {{ Form::text('lastName', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'edit_lastName'))}}
							            </div>
							            {{ ($errors->has('lastName') ? $errors->first('lastName') : '') }}                
							        </div>
							
							        @if (Sentry::getUser()->hasAccess('admin'))
							        <div class="form-group">
							            {{ Form::label('edit_memberships', 'Group Memberships', array('class' => 'col-sm-2 control-label'))}}
							            <div class="col-sm-10">
							                @foreach ($allGroups as $group)
							                    <label class="checkbox-inline">
							                        <input type="checkbox" name="groups[{{ $group->id }}]" value='1' 
							                        {{ (in_array($group->name, $userGroups) ? 'checked="checked"' : '') }} > {{ $group->name }}
							                    </label>
							                @endforeach
							            </div>
							        </div>
							        @endif
							
							        <div class="form-group">
							            <div class="col-sm-offset-2 col-sm-10">
							                {{ Form::hidden('id', $user->id) }}
							                {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary'))}}
							            </div>
							      </div>
							    {{ Form::close()}}
							</div>
						
							<h4>Change Password</h4>
							<div class="well">
						    	{{ Form::open(array(
						        'action' => array('UserController@change', $user->id), 
						        'class' => 'form-inline', 
						        'role' => 'form'
						        )) }}
						        
						        <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
						        	{{ Form::label('oldPassword', 'Old Password', array('class' => 'sr-only')) }}
									{{ Form::password('oldPassword', array('class' => 'form-control', 'placeholder' => 'Old Password')) }}
						    	</div>
						
						        <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
						        	{{ Form::label('newPassword', 'New Password', array('class' => 'sr-only')) }}
						            {{ Form::password('newPassword', array('class' => 'form-control', 'placeholder' => 'New Password')) }}
						    	</div>
						
						    	<div class="form-group {{ $errors->has('newPassword_confirmation') ? 'has-error' : '' }}">
						        	{{ Form::label('newPassword_confirmation', 'Confirm New Password', array('class' => 'sr-only')) }}
						            {{ Form::password('newPassword_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) }}
						    	</div>
						
						        {{ Form::submit('Change Password', array('class' => 'btn btn-primary'))}}
							        	
						        {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
						        {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
						        {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}
						
						        {{ Form::close() }}
							</div>
							  
	                     </div>
                        
                    </div>	                
                </div>
			</div>  
    
			<!-- end row -->
		</div>
	</div>
</div>

@stop
