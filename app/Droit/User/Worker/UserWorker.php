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


}