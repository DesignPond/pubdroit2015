@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}">Dashboard</a></li>
				<li class="active">Inscriptions</li>
			</ol>
			<h1>Inscriptions</h1>
			<div class="options">
				<div class="btn-toolbar">
                     <a href="{{ url('admin/pubdroit/invoice/event/'.$event->id) }}" class="btn btn-green"><i class="fa fa-file-text-o"></i> &nbsp;Factures</a>
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
					
					<div class="panel panel-sky"> <!-- start panel --> 
                        <div class="panel-heading">
                            <h4><?php echo $event->titre; ?></h4>
                        </div>
                        <div class="panel-body collapse in">	
							
							@if( !$inscriptions->isEmpty() )
							
							<div class="btn-group toggle-group">
	                       		<a class="btn btn-sm btn-default" href="javascript:void(6);" onclick="fnShowHide(6);">Email<br></a>
						   		<a class="btn btn-sm btn-default" href="javascript:void(8);" onclick="fnShowHide(8);">Profession<br></a>
						   		<a class="btn btn-sm btn-default" href="javascript:void(12);" onclick="fnShowHide(12);">Canton<br></a>
						   		<a class="btn btn-sm btn-default" href="javascript:void(13);" onclick="fnShowHide(13);">Pays<br></a>
							</div>
							
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="inscriptionsTable">
	                            <thead>
	                                <tr>
	                                    <th>ID</th>
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
		                            <?php 
		                            
									foreach($inscriptions as $inscrit)
		                            { 		                            	
		                            	if( $inscrit )
										{		                            	
		                                   	echo '<tr class="odd gradeX">';										   	
										   		echo '<td><a class="btn btn-sm btn-primary" href="'.url('admin/users/'.$inscrit->user_id).'">&Eacute;diter</a></td>';
												echo '<td>'.$inscrit->inscriptionNumber.'</td>';
												echo '<td>'.$inscrit->inscription_at->format('d-m-Y').'</td>';
												echo '<td>'.$custom->whatCivilite($inscrit->civilite).'</td>';
												echo '<td>'.$inscrit->prenom.'</td>';
												echo '<td>'.$inscrit->nom.'</td>';
												echo '<td>'.$inscrit->email.'</td>';
												echo '<td>'.$inscrit->entreprise.'</td>';
												echo '<td>'.$custom->whatProfession($inscrit->profession).'</td>';
												echo '<td>'.$inscrit->adresse.'</td>';
												echo '<td>'.$inscrit->npa.'</td>';
												echo '<td>'.$inscrit->ville.'</td>';
												echo '<td>'.$custom->whatCanton($inscrit->canton).'</td>';
												echo '<td>'.$custom->whatPays($inscrit->pays).'</td>';								
										   	echo '</tr>';
		                                } 
		                            }
		                            
		                            ?>									
	                            </tbody>
	                       </table>
	                       @else
	                       
	                       	<p>Aucune inscription pour le moment</p>
	                       
	                       @endif
	                       
					   </div>
                    </div> <!-- end panel --> 
					
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop