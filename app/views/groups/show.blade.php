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

			<h4>{{ $group['name'] }} Group</h4>
			<div class="well clearfix">
				<div class="col-md-10">
				    <strong>Permsissions:</strong>
				    <ul>
				    	@foreach ($group->getPermissions() as $key => $value)
				    		<li>{{ ucfirst($key) }}</li>
				    	@endforeach
				    </ul>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" onClick="location.href='{{ action('GroupController@edit', array($group->id)) }}'">Edit Group</button>
				</div> 
			</div>
			<hr />
			<h4>Group Object</h4>
			<div>
			    {{ var_dump($group) }}
			</div>
			
		</div>
	</div>
</div>   	

@stop