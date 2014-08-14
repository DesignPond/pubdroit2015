@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Colloques - {{ $title }}</h1>
        <div class="options">
            <div class="btn-toolbar">
                @if(!$archive)
                    <a href="{{ url('admin/colloque/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row"><!-- start row -->

        @if ( !empty($colloques) )
            @foreach($colloques as $colloque)

            <?php

                $color    = ($archive ? 'orange': 'info');
                $filename = ( !$colloque->colloque_files->isEmpty() ? $colloque->colloque_files->first()->filename : null );
                $vignette = ( $filename ? $filename : 'default.png');
            ?>

            <div class="col-md-6">
                <div class="panel panel-{{ $color }}">
                    <div class="panel-heading"><h4><i class="fa fa-calendar icon-highlight icon-highlight-default"></i> {{ $colloque->titre }}</h4></div>
                    <div class="panel-body colloque-info">

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" width="50" src="{{ asset('files/vignette/'.$vignette); }}" alt="vignette">
                            </a>
                            <div class="media-body">
                                <p>{{ $colloque->organisateur }}</p>
                                <p><strong>Date:</strong> {{ Custom::formatDate( $colloque->dateDebut ) }}</p>
                            </div>
                        </div>

                        <div class="btn-group pull-right">
                            <a class="btn btn-sm btn-info" href="{{ url('admin/colloque/'.$colloque->id.'/edit') }}">&Eacute;diter</a>
                            <a class="btn btn-sm btn-success" href="{{ url('admin/inscription/colloque/'.$colloque->id) }}">Inscriptions
                                <span class="badge blank">{{ $colloque->colloque_inscriptions->count() }}</span>
                            </a>
                            <a class="btn btn-sm btn-primary" href="{{ url('admin/invoice/colloque/'.$colloque->id) }}">Factures</a>
                        </div>

                    </div>
                </div>
            </div>

            @endforeach
        @endif

        </div> <!-- end row -->
    </div><!-- end container -->
    	
@stop