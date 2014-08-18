@extends('layouts.admin')
@section('content')

<?php  $custom = new Custom; ?>

    <div id="page-heading">
        <h1>Inscriptions</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/colloque/'.$colloque->id.'/edit') }}" class="btn btn-info"><i class="fa fa-certificate"></i> &nbsp;Retour au colloque</a>
                <a href="{{ url('admin/invoice/colloque/'.$colloque->id) }}" class="btn btn-green"><i class="fa fa-file-text-o"></i> &nbsp;Factures</a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-midnightblue"> <!-- start panel -->
                    <div class="panel-heading">
                        <h4><?php echo $colloque->titre; ?></h4>
                    </div>
                    <div class="panel-body collapse in">

                        @if( !$inscriptions->isEmpty() )

                        <div class="btn-group toggle-group">
                            <a class="btn btn-sm btn-default" href="javascript:void(6);" onclick="fnShowHide(6);">Email<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(8);" onclick="fnShowHide(8);">Profession<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(12);" onclick="fnShowHide(12);">Canton<br></a>
                            <a class="btn btn-sm btn-default" href="javascript:void(13);" onclick="fnShowHide(13);">Pays<br></a>
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="inscriptionsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
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

                                foreach($inscriptions as $inscrit)
                                {
                                    if( $inscrit )
                                    {
                                        echo '<tr class="odd gradeX">';
                                            echo '<td><a class="btn btn-sm btn-primary" href="'.url('admin/users/'.$inscrit->user_id).'">&Eacute;diter</a></td>';
                                            echo '<td>'.$inscrit->numero.'</td>';
                                            echo '<td>'.$inscrit->created_at->format('d/m/Y').'</td>';
                                            echo '<td>'.$custom->whatCivilite($inscrit->civilite_id).'</td>';
                                            echo '<td>'.$inscrit->prenom.'</td>';
                                            echo '<td>'.$inscrit->nom.'</td>';
                                            echo '<td>'.$inscrit->email.'</td>';
                                            echo '<td>'.$inscrit->entreprise.'</td>';
                                            echo '<td>'.$custom->whatProfession($inscrit->profession_id).'</td>';
                                            echo '<td>'.$inscrit->adresse.'</td>';
                                            echo '<td>'.$inscrit->npa.'</td>';
                                            echo '<td>'.$inscrit->ville.'</td>';
                                            echo '<td>'.$custom->whatCanton($inscrit->canton_id).'</td>';
                                            echo '<td>'.$custom->whatPays($inscrit->pays_id).'</td>';
                                        echo '</tr>';
                                    }
                                }

                                ?>
                            </tbody>
                       </table>
                       @else

                        <p>Aucune inscription pour le moment</p>

                       @endif

                   </div>
                </div> <!-- end panel -->

            </div>
        </div>
    </div>

@stop