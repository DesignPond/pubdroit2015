@extends('layouts.admin')
@section('content')

<?php  $custom = new \Custom; ?>

    <div id="page-heading">
        <h1>Administration</h1>
    </div>
    <div class="container">

    <!-- row -->
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-indigo">
                            <div class="panel-heading"><h4>Dernières inscriptions</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-9 col-sm-3">Numero</th>
                                            <th class="col-xs-9 col-sm-3">Nom</th>
                                            <th class="col-sm-6 hidden-xs">Email</th>
                                            <th class="col-xs-2 col-sm-2"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="selects">
                                        @if(!$inscriptions->isEmpty())
                                            @foreach($inscriptions as $inscription)
                                            <tr>
                                                <td><strong>{{ $inscription->numero }}</strong></td>
                                                <td>{{ $inscription->addresse->prenom }} {{ $inscription->addresse->nom }}</td>
                                                <td class="hidden-xs">{{ $inscription->users->email }}</td>
                                                <td><a href="{{ url('admin/users/'.$inscription->users->id) }}" class="btn btn-sm btn-sky">Voir</a></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div><!-- END 6 COL -->

                    <div class="col-md-6">
                        <div class="panel panel-grape">
                            <div class="panel-heading"><h4>Colloques en cours</h4></div>
                            <div class="panel-body">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$colloques->isEmpty())
                                        @foreach($colloques as $colloque)
                                        <tr>
                                            <td>{{ $colloque->titre }}</td>
                                            <td>
                                                <?php
                                                    echo $custom->formatDate($colloque->dateDebut);
                                                ?>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url('admin/colloque/'.$colloque->id) }}" class="btn btn-sm btn-sky">Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- END 6 COL -->
                </div><!-- END ROW -->

            </div>
        </div>
    <!-- end row -->

    </div>
    	
@stop