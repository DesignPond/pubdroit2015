@extends('layouts.admin')
@section('content')

<?php  $custom = new Custom; ?>

    <div id="page-heading">
        <h1>Factures</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/colloque/'.$colloque->id.'/edit') }}" class="btn btn-info"><i class="fa fa-certificate"></i> &nbsp;Retour au colloque</a>
                <a href="{{ url('admin/inscription/colloque/'.$colloque->id) }}" class="btn btn-midnightblue"><i class="fa fa-file-text-o"></i> &nbsp;Inscriptions</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-green"> <!-- start panel -->
                    <div class="panel-heading">
                        <h4><?php echo $colloque->titre; ?></h4>
                    </div>
                    <div class="panel-body collapse in">

                        @if( !$factures->isEmpty() )

                        <div class="btn-group toggle-group">
                            <a class="btn btn-sm btn-default" href="javascript:void(6);" onclick="fnShowHide(6);">Email<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(8);" onclick="fnShowHide(8);">Profession<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(12);" onclick="fnShowHide(12);">Canton<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(13);" onclick="fnShowHide(13);">Pays<br></a>
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="inscriptionsTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Titre </th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Entreprise</th>
                                    <th>Profession</th>
                                    <th>Adresse</th>
                                    <th>NPA</th>
                                    <th>Ville</th>
                                    <th>Canton</th>
                                    <th>Pays</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                foreach($factures as $facture)
                                {
                                    if( $facture )
                                    {
                                        echo '<tr class="odd gradeX">';

                                            echo '<td><a href="'.url('admin/users/'.$facture->user_id).'" class="btn btn-green">'.$facture->user_id.'</a></td>';
                                            echo '<td>'.$facture->numero.'</td>';
                                            echo '<td>'.$facture->created_at->format('d/m/Y').'</td>';
                                            echo '<td>'.$custom->whatCivilite($facture->civilite_id).'</td>';
                                            echo '<td>'.$facture->prenom.'</td>';
                                            echo '<td>'.$facture->nom.'</td>';
                                            echo '<td>'.$facture->email.'</td>';
                                            echo '<td>'.$facture->entreprise.'</td>';
                                            echo '<td>'.$custom->whatProfession($facture->profession_id).'</td>';
                                            echo '<td>'.$facture->adresse.'</td>';
                                            echo '<td>'.$facture->npa.'</td>';
                                            echo '<td>'.$facture->ville.'</td>';
                                            echo '<td>'.$custom->whatCanton($facture->canton_id).'</td>';
                                            echo '<td>'.$custom->whatPays($facture->pays_id).'</td>';

                                        echo '</tr>';
                                    }
                                 }

                            ?>
                            </tbody>
                       </table>
                       @else

                        <p>Aucune facture pour le moment</p>

                       @endif

                   </div>
                </div> <!-- end panel -->

            </div>
        </div>
    </div>

@stop