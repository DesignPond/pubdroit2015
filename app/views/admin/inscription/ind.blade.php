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
					
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                            <thead>
                                <tr>
                                    <th>UID</th>
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Titre </th>
                                    <th>Prénom</th>
									<th>Nom</th>
                                    <th>Email</th>
                                    <th>Entreprise</th>
                                    <th>Profession</th>
                                    <th>Adresse</th>
									<th>NPA</th>
                                    <th>Ville</th>
                                    <th>Canton</th>
                                    <th>Pays</th>
                                </tr>
                            </thead>
                            <tbody>
	                            @if(!empty($inscriptions))
	                            <?php 
	                            
	                            	foreach($inscriptions as $inscrit)
	                            	{ 
	                                   	echo '<tr class="odd gradeX">';
									   	
									   		echo '<td>'.$inscrit->id.'</td>';
											echo '<td>'.$inscrit->inscriptionNumber.'</td>';
											echo '<td>'.$inscrit->inscription_at->toDateTimeString().'</td>';
											echo '<td>'.$custom->ifExist($inscrit->users->civilite).'</td>';
											echo '<td>'.$inscrit->users->prenom.'</td>';
											echo '<td>'.$inscrit->users->nom.'</td>';
											echo '<td>'.$inscrit->users->email.'</td>';
											echo '<td>'.$custom->ifExist($inscrit->users->entreprise).'</td>';
											echo '<td>'.$custom->ifExist($inscrit->users->profession).'</td>';
											echo '<td>'.$inscrit->users->adresse.'</td>';
											echo '<td>'.$custom->ifExist($inscrit->users->npa).'</td>';
											echo '<td>'.$inscrit->users->ville.'</td>';
											echo '<td>'.$custom->ifExist($inscrit->users->canton).'</td>';
											echo '<td>'.$inscrit->users->pays.'</td>';
										
									   	echo '</tr>';
	                                } 
	                            ?>
								@endif
                            </tbody>
                       </table>
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop