@extends('layouts.pdf')

@section('content')

<?php  $custom = new Custom; ?>
 
<body>

	<div class="container" id="wrapper">
	
		<!-- Header table start-->
		<table id="header" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
			<tr>
				<td width="60%">
					<!-- Logo and title table -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;padding:0;">
					<!-- Logo -->
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
				<td width="40%">
					<!-- User infos -->	
					<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;padding:0;">
					<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
					<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
					<tr>
						<td>
						 	<p id="userInfos">
				         
								<?php echo $custom->ifExist($data['civilite']).' '.$custom->ifExist($data['user']['prenom']).' '.$custom->ifExist($data['user']['nom']); ?><br/>
					            <?php if(!empty($data['user']['entreprise'])){ echo $data['user']['entreprise'].'<br/>'; } ?>
					            <?php echo $custom->ifExist($data['user']['adresse']); ?><br/>
					            <?php if(!empty($data['user']['complement'])){ echo $data['user']['complement'].'<br/>'; } ?>
					            <?php if(!empty($data['user']['cp'])){ echo 'CP '.$data['user']['cp'].'<br/>'; } ?>
					            <?php echo $custom->ifExist($data['user']['npa']).' '.$custom->ifExist($data['user']['ville']); ?>
					            
							 </p>
			   			</td>
					</tr>
					</table>	
			   		<!-- END User infos -->				
				</td>
			</tr>
			<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
			<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
		</table>
		<!-- Header table end-->
		
		<!-- Content table start-->
		<table id="content" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
	    	<tr>
	    		<td colspan="2"> 		
	               <h2 style="font-family:sans-serif;"><strong>FACTURE No <?php echo $custom->ifExist($data['inscription']['inscriptionNumber']); ?></strong></h2>
	               <h2 style="font-family:sans-serif;"><?php echo $custom->ifExist($data['event']['titre']); ?><br/><?php echo $custom->ifExist($data['event']['soustitre']); ?></h2>
	               <p class="red"><strong><?php echo $data['event']['endroit']; ?></strong></p>         
				</td>
	        </tr>
	       <tr>
				<td colspan="2" align="left">
					<p style="text-align:left;"> Nous vous confirmons votre participation :<strong> <?php echo $custom->ifExist($data['event']['sujet']); ?>
					</strong>  du <?php echo $custom->formatDate($data['event']['dateDebut']); ?>.</p>
				</td>
			</tr>
			<tr>
				<td width="40%"><p style="text-align:left; margin:0;" class="txt">Le montant de l'inscription est de:</p></td>
				<td width="60%"><p style="text-align:left; margin:0;"><strong><?php echo $custom->ifExist($data['price']['price']); ?> CHF</strong></p></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><span style="font-size:11px;">(montant non-soumis à la TVA)</span ></td>
			</tr>
			<tr>
				<td colspan="2">
					<p style="text-align:left;"> Avec nos remerciements et nos salutations les meilleures.</p>
					<p style="text-align:left;" class="lieuetdate">Neuch&acirc;tel, le <?php echo $custom->formatDate(date('Y-m-d')); ?>.</p>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<p style="text-align:right;"><span class="signature">Le secr&eacute;tariat de la Facult&eacute; de droit</span></p>
				</td>
			</tr>
			<tr><td><p>&nbsp;</p></td><td><p></p></td></tr><!-- empty line -->
			
			<?php if(isset($listpdf)){ 
					 if(in_array('pdfbon', $listpdf)){ 	?>
			<tr>
				<td align="left" colspan="2">
					<strong class="red">Annexe : bon de participation &agrave; pr&eacute;senter &agrave; l'entr&eacute;e</strong>
				</td>
			</tr>  
			<?php } } ?>    
	
	    </table>
	    <!-- Content table end-->
	    
	</div>
	
</body>	
	
@stop
