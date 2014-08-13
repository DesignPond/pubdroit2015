@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Dashboard</h1>
    </div>
    <div class="container">

        <!-- row -->
            <div class="row">
                <div class="col-md-12">
                <?php
                    echo '<pre>';
                    print_r($event);
                    echo '</pre>';
                ?>

                </div>
            </div>
        <!-- end row -->

    </div>
    	
@stop