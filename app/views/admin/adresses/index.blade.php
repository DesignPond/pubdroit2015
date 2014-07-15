@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>Adresses</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/adresses/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Ajouter une adresse</a>
	            </div>
			</div>
		</div>
		
		<div class="container">

			<div class="row"><!-- start row -->
	          <div class="col-md-12">
	              <div class="panel panel-sky">               
	                  <div class="panel-heading">
	                        <h4>Adresses</h4>
	                  </div>
	                  <div class="panel-body collapse in">
	               
	                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered adresse_table" id="adresse_table">
								<thead>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Email</th>
									<th>Adresses</th>
									<th>Ville</th>	
									<th>Options</th>									
								</thead>
								<tbody></tbody>
							</table>
							
	                    </div><!-- end body panel --> 
                    </div><!-- end panel -->    
                                
                </div><!-- end col -->           
			</div><!-- end row -->
			
		</div><!-- end container  -->
	</div><!-- end wrap  -->
</div><!-- end pge-content  -->

@stop
