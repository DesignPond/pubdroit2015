@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Spécialisation</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/specialisation/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @foreach($specialisations as $specialisation)

                <div class="specialisation">
                    <h3><strong>{{ $specialisation->titre }}</strong></h3>
                    <div class="btn-group-vertical specialisation-btn">
                        <a class="btn btn-xs btn-orange" href="{{ url('admin/specialisation/'.$specialisation->id.'/edit') }}">&eacute;diter</a>
                        <a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $specialisation->titre; ?>" href="{{ url('admin/specialisation/'.$specialisation->id.'/delete') }}">X</a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

@stop

