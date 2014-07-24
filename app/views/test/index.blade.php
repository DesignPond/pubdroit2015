@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">
				<ol class="breadcrumb">
					<li class="active"><a href="index.htm">Dashboard</a></li>
				</ol>
				<h1>Dashboard</h1>
			</div>
			<div class="container">
			
			<!-- row -->
				<div class="row">
	                <div class="col-md-12">
	              					              				
	              		<?php

					  		echo '<pre>';
                            print_r($result);
                            echo '</pre>';

				  		?>

                        <form role="form">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
	              					              				
	                </div>
	            </div>
	        <!-- end row -->

			</div>
		</div>
	</div>
    	
@stop