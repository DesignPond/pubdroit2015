<div class="well">

    <div id="specs">
        <h4>Spécialisations &nbsp;	&nbsp;
            <a data-toggle="collapse" data-parent="#specs" href="#addspecs" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
        </h4>
        <div id="addspecs" class="collapse">

            {{ Form::open(array('url' => 'admin/adresses/specialisation' , 'class' => 'form-inline row')) }}
            <div class="form-group col-md-10">
                <?php echo Form::select('specialisation_id', $allSpecialisations , null , array('class' => 'form-control') ); ?>
                <?php echo Form::hidden('adresse_id', $adresse->id ); ?>
                <?php
                if( isset($adresse->user_id) && ($adresse->user_id > 0) ){
                    echo Form::hidden('user_id', $adresse->user_id );
                }
                ?>
            </div>
            <div class="col-md-2 text-right"><button type="submit" class="btn btn-info">Ajouter</button></div>
            {{ Form::close() }}

        </div>
    </div>
    <?php if( !$specialisations->isEmpty() ){ ?>
        <div class="list-group">
            <?php
            foreach ($specialisations as $spec)
            {
                echo '<div class="list-group-item">';
                echo Form::open(array('url' => 'admin/adresses/removeSpecialisation'));
                echo $spec->titre;
                echo Form::hidden('specialisation_id', $spec->specialisation_id );
                echo Form::hidden('user_id', $adresse->user_id );
                echo Form::hidden('adresse_id', $adresse->id );
                echo '<button type="submit" class="btn btn-xs btn-danger">X</button>';
                echo Form::close();
                echo '</div>';
            }
            ?>
        </div>
    <?php } ?>
</div>
<div class="well">
    <div id="members">
        <h4>Membre de &nbsp; &nbsp;
            <a data-toggle="collapse" data-parent="#members" href="#addmembers" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
        </h4>
        <div id="addmembers" class="collapse">

            {{ Form::open(array('url' => 'admin/adresses/membre' , 'class' => 'form-inline row')) }}
            <div class="form-group col-md-10">
                <?php echo Form::select('membre_id', $allmembres , null , array('class' => 'form-control') ); ?>
                <?php echo Form::hidden('adresse_id', $adresse->id ); ?>
                <?php
                if( isset($adresse->user_id) && ($adresse->user_id > 0) ){
                    echo Form::hidden('user_id', $adresse->user_id );
                }
                ?>
            </div>
            <div class="col-md-2 text-right"><button type="submit" class="btn btn-info">Ajouter</button></div>
            {{ Form::close() }}

        </div>
    </div>
    <?php

    if( !$membres->isEmpty() ){ ?>
        <div class="list-group">
            <?php
            foreach ($membres as $membre)
            {
                echo '<div class="list-group-item">';
                echo Form::open(array('url' => 'admin/adresses/removeMembre'));
                echo $membre->titre;
                echo Form::hidden('id', $membre->membre_id );

                if($adresse)
                {
                    echo Form::hidden('user_id', $adresse->user_id );
                    echo Form::hidden('adresse_id', $adresse->id );
                }
                else
                {
                    echo Form::hidden('user_id', $user->id );
                }

                echo '<button type="submit" class="btn btn-xs btn-danger">X</button>';
                echo Form::close();
                echo '</div>';
            }
            ?>
        </div>

    <?php } ?>
</div>