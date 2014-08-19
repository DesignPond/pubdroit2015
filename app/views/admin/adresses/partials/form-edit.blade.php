{{ Form::open(array( 'url' => 'admin/adresses/'.$adresse->id , 'method' => 'PUT' )) }}

    <div class="row"><!-- row -->
        <h3><strong><?php echo $custom->whatType($adresse->type); ?></strong></h3>
    </div>
    <div class="form-group row">
        <label for="civilite" class="col-sm-3 control-label">Civilite</label>
        <div class="col-sm-6">
            {{ Form::select('civilite_id', $civilites , $adresse->civilite_id , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="prenom" class="col-sm-3 control-label">Prénom</label>
        <div class="col-sm-6">
            {{ Form::text('prenom', $custom->format_name($adresse->prenom) , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="nom" class="col-sm-3 control-label">Nom</label>
        <div class="col-sm-6">
            {{ Form::text('nom', $custom->format_name($adresse->nom) , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6">
            {{ Form::text('email', $adresse->email , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="entreprise" class="col-sm-3 control-label">Entreprise</label>
        <div class="col-sm-6">
            {{ Form::text('entreprise', $adresse->entreprise , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="profession" class="col-sm-3 control-label">Profession</label>
        <div class="col-sm-6">
            {{ Form::select('profession_id', $professions , $adresse->profession_id , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="fonction" class="col-sm-3 control-label">Fonction</label>
        <div class="col-sm-6">
            {{ Form::text('fonction', $adresse->fonction , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="telephone" class="col-sm-3 control-label">Téléphone</label>
        <div class="col-sm-6">
            {{ Form::text('telephone', $adresse->telephone , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="mobile" class="col-sm-3 control-label">Mobile</label>
        <div class="col-sm-6">
            {{ Form::text('mobile', $adresse->mobile , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="fax" class="col-sm-3 control-label">Fax</label>
        <div class="col-sm-6">
            {{ Form::text('fax', $adresse->fax , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="adresse" class="col-sm-3 control-label">Adresse</label>
        <div class="col-sm-6">
            {{ Form::text('adresse', $adresse->adresse , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="complement" class="col-sm-3 control-label">Complément d'adresse</label>
        <div class="col-sm-6">
            {{ Form::text('complement', $adresse->complement , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="cp" class="col-sm-3 control-label">Case postale</label>
        <div class="col-sm-6">
            {{ Form::text('cp', $adresse->cp , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="npa" class="col-sm-3 control-label">NPA</label>
        <div class="col-sm-6">
            {{ Form::text('npa', $adresse->npa , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="ville" class="col-sm-3 control-label">Ville</label>
        <div class="col-sm-6">
            {{ Form::text('ville', $adresse->ville , array('class' => 'form-control required' )) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="form-group row">
        <label for="canton" class="col-sm-3 control-label">Canton</label>
        <div class="col-sm-6">
            {{ Form::select('canton_id', $cantons , $adresse->canton_id , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block"></p></div>
    </div>

    <div class="form-group row">
        <label for="pays" class="col-sm-3 control-label">Pays</label>
        <div class="col-sm-6">
            {{ Form::select('pays_id', $pays , $adresse->pays_id , array( 'class' => 'form-control required' ) ) }}
        </div>
        <div class="col-sm-3"><p class="help-block">Requis</p></div>
    </div>

    <div class="row">
        <div class="btn-toolbar">

            {{ Form::hidden('user_id', $adresse->user_id ) }}
            {{ Form::hidden('type', $adresse->type ) }}
            {{ Form::hidden('id', $adresse->id ) }}
            {{ Form::hidden('livraison', $adresse->livraison ) }}
            <?php  echo ( $adresse->user_id > 0 ? Form::hidden('redirectTo', 'users/'.$adresse->user_id ) : ''); ?>

            <button type="submit" class="btn-primary btn">Envoyer</button>
        </div>
    </div>

{{ Form::close() }}
