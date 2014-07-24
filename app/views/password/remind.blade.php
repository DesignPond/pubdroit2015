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

                    {{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'POST')) }}
                        <div class="form-group">
                            {{ Form::label('email', 'Adresse email') }}
                            {{ Form::email('email',null, array( 'class' => 'form-control', 'placeholder' => 'Entrez votre email')) }}
                            <p class="help-block">
                                Veuillez saisir votre identifiant ou votre adresse de messagerie.
                                Un lien permettant de créer un nouveau mot de passe vous sera envoyé par e-mail
                            </p>
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