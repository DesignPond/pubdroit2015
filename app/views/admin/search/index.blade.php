@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">
				<ol class="breadcrumb">
					<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
				</ol>
				<h1>Recherche</h1>
			</div>
			<div class="container">
			
				<!-- row -->
					<div class="row">
		                <div class="col-md-12">
		                
			                {{ Form::open(array( 'url' => 'admin/search' )) }}
				                <div class="form-group">
									<label class="col-sm-1 control-label">Recherche</label>
										<div class="col-sm-4">
											<div class="input-group">
											<input class="form-control" name="search" type="text">
											<div class="input-group-btn">
												<button class="btn btn-info" type="button">Go!</button>
											</div>
										</div>
									</div>
								</div>
				             {{ Form::close() }}	
						
		                </div>
		            </div>
		        <!-- end row -->
		        <hr/>
     			<!-- Start row -->				
				<div class="row">
	              <div class="col-md-12">
	                    <div class="panel panel-midnightblue">
	                    
	                        <div class="panel-heading">
	                            <h4>Résultats pour "<?php echo $search; ?>" dans adresses</h4>
	                        </div>
	                        
	                        <div class="panel-body collapse in">
	                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered search_table" id="example">
	                                <thead>
	                                    <tr>                                        
	                                        <th>Prenom</th>
	                                        <th>Nom</th>
	                                        <th>Email</th>
	                                        <th>Entreprise</th>
	                                        <th>Adresse</th>	                                        
	                                        <th>Ville</th>
	                                        <th>Action</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                
	                                <?php if(!empty($adresses)){ ?>
	                                <?php foreach($adresses as $adresse){ ?>
	                                    <tr class="odd gradeX">
	                                        <td><?php echo $adresse->prenom; ?></td>
	                                        <td><?php echo $adresse->nom; ?></td>
	                                        <td class="center"><?php echo $adresse->email; ?></td>
	                                        <td class="center"><?php echo $adresse->entreprise; ?></td>	
	                                        <td class="center"><?php echo $adresse->adresse; ?></td>	                                        
	                                        <td class="center"><?php echo $adresse->ville; ?></td>
	                                        <td><a class="btn btn-primary btn-sm edit_btn" href="{{ url('admin/adresses/'.$adresse->id) }}">éditer</a></td>	                                        
	                                    </tr>
	                                <?php }} ?>

	                                </tbody>
	                            </table>
	                        </div>
	                        
	                    </div>	                
	                </div>
				</div>  		      
				<!-- end row -->

				<!-- Start row -->				
				<div class="row">
	              <div class="col-md-12">
	                    <div class="panel panel-green">
	                    
	                        <div class="panel-heading">
	                            <h4>Résultats pour "<?php echo $search; ?>" dans les utilisateurs</h4>
	                        </div>
	                        
	                        <div class="panel-body collapse in">
	                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered search_table" id="example">
	                                <thead>
	                                    <tr>
	                                        <th>Prenom</th>
	                                        <th>Nom</th>
	                                        <th>Email</th>
	                                        <th>Status</th>
	                                        <th>Action</th>	                                        
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                
	                                <?php if(!empty($users)){ ?>
	                                <?php foreach($users as $user){ ?>
	                                    <tr class="odd gradeX">
	                                        <td><?php echo $user->prenom; ?></td>
	                                        <td><?php echo $user->nom; ?></td>
	                                        <td class="center"><?php echo $user->email; ?></td>
	                                        <td><?php if( $user->activated == 1 ) { echo 'Active'; } else{ echo 'Inactive'; }  ?></td>
	                                        <td><a class="btn btn-primary btn-sm edit_btn" href="{{ url('admin/users/'.$user->uid) }}">éditer</a></td>	                                        
	                                    </tr>
	                                <?php }} ?>

	                                </tbody>
	                            </table>
	                        </div>
	                        
	                    </div>	                
	                </div>
				</div>  		      
				<!-- end row -->

			</div>
		</div>
	</div>
    	
@stop