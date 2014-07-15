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
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset('fonts/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/datatables/dataTables.css');?>" rel="stylesheet">
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
	<!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo asset('css/admin/ie8.css');?>">
		<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->
</head>

<body class="focusedform">

	<div class="verticalcenter">
		<a href="index.htm">Administration Droit Formation</a>
		
		<div class="panel panel-primary">
			<div class="panel-body">
				<h4 class="text-center" style="margin-bottom: 25px;">Log in to get started</h4>
				
					@if (Session::has('flash_error'))
					        <div class="alert alert-error">
                            	<strong>Error.</strong><br/> {{ Session::get('flash_error') }}
							</div>
					@endif
					
					{{ Form::open(array( 'action' => 'SessionController@store' , 'class' => 'form-horizontal')) }}
						<div class="form-group">
							<label for="email" class="control-label col-sm-4" style="text-align: left;">Email</label>
							<div class="col-sm-8">
								{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
								{{ ($errors->has('email') ? $errors->first('email') : '') }}
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="control-label col-sm-4" style="text-align: left;">Password</label>
							<div class="col-sm-8">
								 {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
								 {{ ($errors->has('password') ?  $errors->first('password') : '') }}
							</div>
						</div>
						 
						<div class="clearfix">
							<div class="pull-right"><label>{{ Form::checkbox('rememberMe', 'rememberMe') }} se souvenir de moi</label></div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					{{ Form::close() }}		
        
			</div>
			
			<div class="panel-footer">
				<a href="{{ route('forgotPasswordForm') }}" class="pull-left btn btn-link" style="padding-left:0">Mot de passe perdu?</a>				
				<div class="pull-right">
					<a href="#" class="btn btn-default">Reset</a>
				</div>
			</div>
			
		</div>
	</div>
    
</body>
</html>