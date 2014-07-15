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
			
			<h4>Available Groups</h4>
			<div class="row">
			  <div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<th>Name</th>
							<th>Permissions</th>
							<th>Options</th>
						</thead>
						<tbody>
						@foreach ($groups as $group)
							<tr>
								<td><a href="groups/{{ $group->id }}">{{ $group->name }}</a></td>
								<td>{{ (isset($group['permissions']['admin'])) ? '<i class="icon-ok"></i> 
								Admin' : ''}} {{ (isset($group['permissions']['users'])) ? '<i class="icon-ok"></i> Users' : ''}}</td>
								<td>
									<button class="btn btn-default" type="button" onClick="location.href='{{ URL::to('groups') }}/{{ $group->id }}/edit/'">Edit</button>
								 	<button class="btn btn-default action_confirm {{ ($group->id == 2) ? 'disabled' : '' }}" 
								 	type="button" data-method="delete" href="{{ URL::to('groups') }}/{{ $group->id }}">Delete</button>
								 </td>
							</tr>	
						@endforeach
						</tbody>
					</table> 
				</div>
				 <button class="btn btn-primary" onClick="location.href='{{ URL::to('groups/create') }}'">New Group</button>
			   </div>
			</div>
			<!--  
				The delete button uses Resftulizer.js to restfully submit with "Delete".  The "action_confirm" class triggers an optional confirm dialog.
				Also, I have hardcoded adding the "disabled" class to the Admin group - deleting your own admin access causes problems.
			-->
			
		</div>
	</div>
</div>   	

@stop

