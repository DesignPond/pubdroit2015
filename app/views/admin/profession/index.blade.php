@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Profession</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/profession/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @foreach($professions as $profession)

                <div class="profession">
                    <h3><strong>{{ $profession->titre }}</strong></h3>
                    <div class="btn-group-vertical profession-btn">
                        <a class="btn btn-xs btn-orange" href="{{ url('admin/profession/'.$profession->id.'/edit') }}">&eacute;diter</a>
                        <a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $profession->titre; ?>" href="{{ url('admin/profession/'.$profession->id.'/delete') }}">X</a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

@stop

