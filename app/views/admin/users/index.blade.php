@extends('layouts.admin')
@section('content')

    <div id="page-heading">
        <h1>Comptes utilisateurs</h1>
        <div class="options">
            <div class="btn-toolbar">
                <a href="{{ url('admin/users/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Ajouter utilisateur</a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
          <div class="col-md-12">
              <div class="panel panel-sky">
                  <div class="panel-heading">
                        <h4>Utilisateurs</h4>
                  </div>
                  <div class="panel-body collapse in">

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered users_table" id="users_table">
                            <thead>
                                <th>Nom d'utilisateur</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Status</th>
                                <th>Adresses</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div><!-- end body panel -->
                </div><!-- end panel -->

            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- end container  -->

@stop
