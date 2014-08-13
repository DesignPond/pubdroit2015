@extends('layouts.admin')
@section('content')

<?php  $custom = new Custom; ?>

    <div id="page-heading">
        <h1>Inscription</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/inscription/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php


                ?>

            </div>
        </div>
    </div>

@stop