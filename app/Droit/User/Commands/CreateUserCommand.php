<?php namespace Droit\User\Commands;

class CreateUserCommand {

    public $prenom;

    public $nom;

    public $email;

    public $password;

    public function __construct($prenom, $nom, $email, $password)
    {
        $this->prenom   = $prenom;
        $this->nom      = $nom;
        $this->email    = $email;
        $this->password = $password;
    }

}
