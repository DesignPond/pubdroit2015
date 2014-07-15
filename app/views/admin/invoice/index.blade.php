@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="{{ url('admin') }}">Dashboard</a></li>
				<li class="active">Factures</li>
			</ol>
			<h1>Factures</h1>
			<div class="options">
				<div class="btn-toolbar">
                     <a href="{{ url('admin/pubdroit/inscription/event/'.$event->id) }}" class="btn btn-sky"><i class="fa fa-file-text-o"></i> &nbsp;Inscriptions</a>
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

					<div class="panel panel-green"> <!-- start panel --> 
                        <div class="panel-heading">
                            <h4><?php echo $event->titre; ?></h4>
                        </div>
                        <div class="panel-body collapse in">	
							
							@if( !$invoices->isEmpty() )
							
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

		                            foreach($invoices as $invoice)
		                            { 
		                            	if( $invoice)
										{
		                                   	echo '<tr class="odd gradeX">';										   	
										   		
											   	echo '<td>'.$invoice->user_id.'</td>';
												echo '<td>'.$invoice->inscriptionNumber.'</td>';
												echo '<td>'.$invoice->payed_at->format('d-m-Y').'</td>';
												echo '<td>'.$custom->whatCivilite($invoice->civilite).'</td>';
												echo '<td>'.$invoice->prenom.'</td>';
												echo '<td>'.$invoice->nom.'</td>';
												echo '<td>'.$invoice->email.'</td>';
												echo '<td>'.$invoice->entreprise.'</td>';
												echo '<td>'.$custom->whatProfession($invoice->profession).'</td>';
												echo '<td>'.$invoice->adresse.'</td>';
												echo '<td>'.$invoice->npa.'</td>';
												echo '<td>'.$invoice->ville.'</td>';
												echo '<td>'.$custom->whatCanton($invoice->canton).'</td>';
												echo '<td>'.$custom->whatPays($invoice->pays).'</td>';	
																		
										   	echo '</tr>';
		                                } 
		                             }
		                             
		                          ?>									
	                            </tbody>
	                       </table>
	                       @else
	                       
	                       	<p>Aucune facture pour le moment</p>
	                       
	                       @endif
	                       
					   </div>
                    </div> <!-- end panel --> 
					
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop