<?php namespace Droit\User\Worker;

use Droit\User\Repo\AdresseInterface;
use Droit\User\Repo\UserInfoInterface;

class UserWorker implements UserWorkerInterface{

    protected $user;

    protected $adresse;

    public function __construct( UserInfoInterface $user , AdresseInterface $adresse)
    {

        $this->adresse  = $adresse;

        $this->user     = $user;

    }

    /**
     * Convert adresse to user
     *
     * @return $user
     */
    public function convert($adresse_id,$password)
    {
        $adresse = $this->adresse->find($adresse_id);

        // Get infos
        $prenom = $adresse->prenom;
        $nom    = $adresse->nom;
        $email  = $adresse->email;

        // Create new user
        $user = $this->user->create(
                    array(
                        'prenom'   => $prenom,
                        'nom'      => $nom,
                        'email'    => $email,
                        'password' => $password
                    )
                );
        if(!$user)
        {
            // Assign user_id to adresse
            $adresse->user_id   = $user->id;
            $adresse->livraison = 1;
            $adresse->type      = 1;
            $adresse->save();

            return $user;
        }

        return false;

    }
}