<!DOCTYPE html>
<html class="no-js">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<link rel="stylesheet" href="<?php echo asset('css/admin/pdf/bon.css');?>">
        <link rel="stylesheet" href="<?php echo asset('css/admin/pdf/bv.css');?>">
		<link rel="stylesheet" href="<?php echo asset('css/admin/pdf/grid.css');?>">
        <style media="all">
			@page { margin: 0in; }
		</style>
    </head>
   
       	<!-- Contenu -->		      	
        @yield('content')	            
		<!-- Fin contenu -->

</html>
