@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Inscriptions</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/profession/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php

                    echo '<pre>';
                    print_r($inscription);
                    echo '</pre>';

                ?>

            </div>
        </div>
    </div>

@stop

