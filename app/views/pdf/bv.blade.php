@extends('layouts.pdf')

@section('content')

<?php  

	$custom = new Custom; 	
	$price  = $custom->preparePrice($data['price']);
?>

<body style="position:relative; height:842px; margin:0;padding:0;">

	<div class="addresse1">
		<p><?php echo $custom->ifExist($data['compte']['adressesCompte']); ?></p>
	</div>
	
	<div class="addresse2">
		<p><?php echo $custom->ifExist($data['compte']['adressesCompte']); ?></p>
	</div>
	
	<div class="nofacture">
		<p>
			<?php echo $custom->ifExist($data['compte']['motifCompte']); ?><br/>
			<?php echo 'No '.$custom->ifExist($data['inscription']['numero']); ?>
		</p>
	</div>

	<p class="compte1"><?php echo $custom->ifExist($data['compte']['infoCompte']); ?></p>	
	<p class="compte2"><?php echo $custom->ifExist($data['compte']['infoCompte']); ?></p>
	
	<p class="prixBvSimple prixBvDroite"><?php echo $price[0]; ?></p>
	
	<p class="centBvSimple centBvDroite"><?php echo $price[1]; ?></p>
	
	<p class="prixBvSimple prixBvGauche"><?php echo $price[0]; ?></p>
	
	<p class="centBvSimple centBvGauche"><?php echo $price[1]; ?></p>

	<img width="100%" style="position:absolute; z-index:1; top:0px;" src="<?php  echo getcwd(); ?>/images/bvfacture.jpg" />

</body>

@stop
