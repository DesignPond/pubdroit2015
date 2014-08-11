@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">

                <!-- Breadcrumbs  -->
                @include('layouts.partials.admin.breadcrumb')

				<h1>Administration</h1>

			</div>
			<div class="container">
			
			<!-- row -->
				<div class="row">
	                <div class="col-md-12">
                        <h1>Inscriptions</h1>

                        @if(!$inscriptions->isEmpty())
                        <ul>
                            @foreach($inscriptions as $inscription)
                                <li>Inscription : {{ $inscription->id }}</li>
                            @endforeach
                        @else
                        <p>Rien pour le moment</p>
                        @endif
	                </div>
	            </div>
	        <!-- end row -->

			</div>
		</div>
	</div>
    	
@stop