@extends('layouts.pdf')

@section('content')

<?php  $custom = new Custom; ?>
	 
<body>
	<div class="container" id="wrapper">
	
		<table id="header" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
			<tr>
				<td width="56%">
					<!-- Logo and title -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;margin-top:20px;padding:0;">
	
						<tr>
							<td><img src="<?php echo $custom->ifExist($data['logo']); ?>" alt="logo Unine" style="height:100px;" /></td>
						</tr>
						<tr>
							<td>
								 <ul class="infos">
				                 	 <li><?php echo $custom->ifExist($data['organisateur']['nom']); ?></li>
				                     <li><?php echo $custom->ifExist($data['organisateur']['adresse']); ?></li>
				                     <li><?php echo $custom->ifExist($data['organisateur']['lieu']); ?></li>
				                </ul> 
				        		<p class="tva"><?php echo $custom->ifExist($data['organisateur']['tva']); ?></p>
							</td>
						</tr>
	
					</table>	
					<!-- END Logo and title -->	
				</td>
				<td width="42%">
					<!-- User infos -->	
					<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;margin-top:20px;padding:0;">
					<tr>
						<td style="margin-top:30px;">
							<p>&nbsp;</p>
							<p style="text-align:left; font-size:12px;" class="">Neuch&acirc;tel, le <?php echo $custom->formatDate(date('Y-m-d')); ?></p>
						</td>
					</tr><!-- empty line -->
					<tr>
						<td>
						 	<p id="userInfos" style="padding-top:15px;">
					            <?php echo $custom->ifExist($data['civilite']).' '.$custom->ifExist($data['user']['prenom']).' '.$custom->ifExist($data['user']['nom']); ?><br/>
					            <?php if(!empty($data['user']['entreprise'])){ echo $data['user']['entreprise'].'<br/>'; } ?>
					            <?php echo $custom->ifExist($data['user']['adresse']); ?><br/>
					            <?php echo $custom->ifExist($data['user']['npa']).' '.$custom->ifExist($data['user']['ville']); ?>
							 </p>
			   			</td>
					</tr>
					</table>	
			   		<!-- END User infos -->				
				</td>
			</tr>
			<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->		
		</table>
		
		<?php if(!empty($data['attestation'])){ ?>
		<table id="content" width="100%"border="0" align="center" cellpadding="0" cellspacing="0" style="border:none;margin:0 40px 0 80px;padding:0;">
	    	<tr>
	    		<td colspan="2"> 		
	               <h1><strong><u>ATTESTATION</u></strong></h1>
	               <p><?php if(!empty($data['attestation']['organisateur'])){ echo $data['attestation']['organisateur'];} ?> atteste que</p>       
				</td>
	        </tr>
	       <tr>
				<td colspan="2" align="center">
					<p><strong><?php echo $custom->ifExist($data['civilite']).' '.$custom->ifExist($data['user']['prenom']).' '.$custom->ifExist($data['user']['nom']); ?></strong></p>
					<p>a participé au séminaire organisé					
						 <?php
						 	
						 	$dateFin   = $data['event']['dateFin'];
						 	$dateDebut = $data['event']['dateDebut'];
						 	
					 		$phrase  = '';
					   	 	
					   	 	$phrase .= ( !empty($dateFin) && ($dateFin != "0000-00-00") && ($dateDebut != $dateFin) ) ? " du " : " le ";
							$phrase .=  $custom->formatDate( $dateDebut ) ; 						
							$phrase .= ( !empty($dateFin) && ($dateFin != "0000-00-00") && ($dateDebut != $dateFin) ) ? " au ".$custom->formatDate($dateFin)." " : "";
							
							echo $phrase;
							
							echo ' à '.$data['attestation']['lieu'];
						?>
					</p>
				</td>
			</tr>
			<?php  if (!empty($data['attestation']['remarque'])){ ?>
				<tr>
					<td colspan="2" align="center"><p>Les thèmes traités étaient :</p></td>
				</tr>
				<tr>
					<td colspan="2" align="left">
						<div id="remarques"> 
							<?php echo $custom->ifExist($data['attestation']['remarque']); ?>
						</div>
					</td>
				</tr>
			<?php } else { ?>
				<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->	
			<?php } ?> 
			<tr>
				<td colspan="2" align="left">
					<p style="text-align:left;padding-top:10px;"><span class="signature"><?php  echo $custom->ifExist($data['attestation']['signature']); ?></span><br/>
					<?php  if(isset($data['attestation']['responsabilite'])){ echo $custom->ifExist($data['attestation']['responsabilite']); }?></span></p>
				</td>
			</tr>      
	     </table>
	     <?php  } else { echo '<p>Pas d\'infos pour l\'attestation spécifiés pour ce colloque</p>';} ?>
	  
	</div>
</body>
	
@stop
