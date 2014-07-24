@extends('layouts.admin')

@section('content')

<div id="page-content">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li class="active"><a href="index.htm">Dashboard</a></li>
            </ol>
            <h1>Dashboard</h1>
        </div>
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-md-offset-3">

                    <!-- messages and errors -->
                    @include('layouts.partials.reminder')

                    {{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'POST')) }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            {{ Form::label('email', 'Adresse email') }}
                            {{ Form::email('email',null, array( 'class' => 'form-control', 'placeholder' => 'Entrez votre email')) }}
                        </div>
                            <div class="form-group">
                            {{ Form::label('password', 'Nouveau mot de passe') }}
                            {{ Form::password('password', array( 'class' => 'form-control', 'placeholder' => 'Entrez un nouveau mot de passe')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirmez le mot de passe') }}
                            {{ Form::password('password_confirmation', array( 'class' => 'form-control')) }}
                        </div>
                        {{ Form::submit('Envoyer',array('class' => 'btn btn-default')) }}
                    {{ Form::close() }}

                </div>
            </div>
            <!-- end row -->

        </div>
    </div>
</div>

@stop