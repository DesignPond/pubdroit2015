@extends('layouts.pdf')
@section('content')

<?php
	$custom = new Custom; 	
	$price  = $custom->preparePrice($data['price']);
?>

<body style="position:relative; height:842px; margin:0;padding:0;">
    <div class="bvWrapper"><!-- Start container with BV -->

        <div class="bvTop"><!-- Adresse -->
            <table border="0" cellspacing="0" cellpadding="0" class="bvTopTxt" align="center">
                <tr>
                    <td class="bvTopCol1"><span><?php echo $custom->ifExist($data['compte']['adressesCompte']); ?></span></td>
                    <td class="bvTopCol2"><span><?php echo $custom->ifExist($data['compte']['adressesCompte']); ?></span></td>
                    <td class="bvTopCol3">
                        <p>
                            <?php echo $custom->ifExist($data['compte']['motifCompte']); ?><br/>
                            <?php echo 'No '.$custom->ifExist($data['inscription']['numero']); ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="bvBottom"><!-- NUmero compte -->
            <table border="0" cellspacing="0" cellpadding="0" class="bvBottomTxt" align="center">
                <tr>
                    <td class="bvBottomCol1"><span><?php echo $custom->ifExist($data['compte']['infoCompte']); ?></span></td>
                    <td class="bvBottomCol2"><span><?php echo $custom->ifExist($data['compte']['infoCompte']); ?></span></td>
                    <td class="bvBottomCol3">&nbsp;</td>
                </tr>
            </table>
        </div>

        <div class="bvSum"><!-- Prix -->
            <table border="0" cellspacing="0" cellpadding="0" class="bvSumTxt" align="center">
                <tr>
                    <td align="right" class="bvSumNumber bvSumLeft">
                        <span>
                            <?php echo $price[0].'<b style="padding:0;margin:0;visibility:hidden;">.</b>'.$price[1]; ?>
                        </span>
                    </td>
                    <td align="right" class="bvSumNumber bvSumRight">
                        <span>
                            <?php echo $price[0].'<b style="padding:0;margin:0;visibility:hidden;">.</b>'.$price[1]; ?>
                        </span>
                    </td>
                </tr>
            </table>
        </div>

    </div><!-- End container with BV -->
	<img width="100%" style="position:absolute; z-index:1; top:0px;" src="<?php  echo getcwd(); ?>/images/bvfacture.jpg" />
</body>

@stop