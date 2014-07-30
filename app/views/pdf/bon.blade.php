@extends('layouts.pdf')

@section('content')

<?php  $custom = new Custom; ?>
 
<body>
	<div class="container" id="wrapper">
	
		<!-- Header table start-->
		<table id="header" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
			<tr>
				<td width="60%">
					<!-- Logo and title -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;padding:0;">
					<tr>
						<td>
							<img src="<?php echo $data['logo']; ?>" alt="logo Unine" style="height:100px;" />
						</td>
					</tr>
					<tr>
						<td>
							<p class="titre"><?php echo $custom->ifExist($data['colloque']['sujet']); ?><br/>
							<span><?php echo $custom->ifExist($data['colloque']['organisateur']); ?></span></p>
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
			<tr><td><p style="margin:0;padding:0;height:10px;">&nbsp;</p></td></tr><!-- empty line -->
			<tr><td><p style="margin:0;padding:0;height:10px;">&nbsp;</p></td></tr><!-- empty line -->
		</table>
		<!-- Header table end-->
		
		<!-- Content table start-->	
	    <table id="content" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
	    	 <tr>
	    		<td>
	    		
	              <h2 style="text-align:center;"><strong>BON DE PARTICIPATION   No <?php echo $custom->ifExist($data['inscription']['numero']); ?></strong></h2>
	              <h2 style="font-family:sans-serif;"><?php echo $custom->ifExist($data['colloque']['titre']); ?><br/><?php echo $data['colloque']['soustitre']; ?></h2>
	              <p  style="font-family:sans-serif;"><?php echo $custom->ifExist($data['colloque']['endroit']); ?></p>
	              <p  style="font-family:sans-serif;"><strong><?php echo $custom->formatDate($data['colloque']['dateDebut']); ?></strong></p>
	              
	              <?php  
	              		if( !empty($data['options']) )
	              		{ 
		              		foreach($data['options'] as $option)
		              		{ 
			              		if($option['titre'] != 'text')
			              		{
							  		echo '<p style="font-family:sans-serif;margin:0;padding:0;font-size:11px;line-height:14px;"><strong>'.$option['titre'].'</strong></p>';
							  	} 
							}
						 } 
				  ?>
	              
				</td>
	         </tr>
	         <tr>
	        	<td align="center">
	               <p><?php if(!empty($data['carte'])) {?><img src="<?php echo $data['carte']; ?>" alt="Carte"><?php } ?></p>
				</td>
	         </tr>
	         <tr>
	         	<td>
		          <p style="font-weight:bold; margin-top:20px;">A pr&eacute;senter lors de votre arriv&eacute;e</p>
				</td>
	         </tr>       
	   </table>
	   <!-- Content table end-->
	</div>
</body>
	
@stop
