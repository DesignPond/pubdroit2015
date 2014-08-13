<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Administration Droit Formation</title>
	
	<meta name="description" content="Administration Droit Formation">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

    <!-- CSS Files
    ================================================== -->
	<link rel="stylesheet" href="<?php echo asset('css/admin/styles.css?=120');?>">
	<link rel="stylesheet" href="<?php echo asset('css/admin/main.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/admin/sidebar-steel.css');?>">
	<link rel="stylesheet" href="<?php echo asset('js/admin/redactor/redactor.css'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset('fonts/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/datatables/dataTables.css');?>" rel="stylesheet">
    <link href="<?php echo asset('css/TableTools.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/jqueryui-timepicker/jquery.ui.timepicker.css');?>" rel="stylesheet">
    <link href="<?php echo asset('js/admin/jqueryui.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/form-multiselect/css/multi-select.css');?>" rel="stylesheet">    
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
	<!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo asset('css/admin/ie8.css');?>">
		<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->

</head>
	<body>

	    <!-- Entête et menu -->
	    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
	        <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
	
	        <div class="navbar-header pull-left">
	            <a class="navbar-brand" href="index.htm">Droit Formation</a>
	        </div>

            <!-- Login  -->
            @include('layouts.partials.admin.login')

	    </header>
		
		<div id="page-container">
			<nav id="page-leftbar" role="navigation">

                <!-- Main navigation -->
                @include('layouts.partials.admin.navigation')

			</nav>
            <div id="page-content">
                <div id="wrap">

                    <!-- Breadcrumbs  -->
                    @include('layouts.partials.admin.breadcrumb')

                    <!-- messages and errors -->
                    @include('layouts.partials.message')

                    <!-- Main content -->
	                @yield('content')

	                <!-- Fin contenu -->

                </div>
            </div>

        </div>
		<!-- Footer infos -->
		<footer role="contentinfo"><!--Footer--></footer>
			
	    <!-- Javascript Files
	    ================================================== -->        
   
	    <script type="text/javascript" src="<?php echo asset('js/admin/jquery-1.10.2.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jqueryui-1.10.3.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/bootstrap.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/enquire.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/redactor/redactor.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.cookie.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.nicescroll.min.js');?>"></script> 
		
		<script type="text/javascript" src="<?php echo asset('plugins/codeprettifier/prettify.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-toggle/toggle.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-parsley/messages.fr.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-parsley/parsley.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-daterangepicker/daterangepicker.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-daterangepicker/moment.min.js');?>"></script>

		<!-- datatable -->
	    <script type="text/javascript" src="<?php echo asset('plugins/datatables/jquery.dataTables.min.js');?>"></script>
	    <script type="text/javascript" src="<?php echo asset('plugins/datatables/dataTables.bootstrap.js');?>"></script>
	    <script type="text/javascript" src="<?php echo asset('js/admin/admin-datatables.js');?>"></script>
	    <script type="text/javascript" src="<?php echo asset('js/admin/TableTools.min.js');?>"></script>
	    
	    <script type='text/javascript' src="<?php echo asset('plugins/form-multiselect/js/jquery.multi-select.min.js'); ?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/placeholdr.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/application.js');?>"></script> 	
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.jeditable.js');?>"></script> 	
	    <script type="text/javascript" src="<?php echo asset('js/admin/main.js');?>"></script>
    	
	</body>
</html>