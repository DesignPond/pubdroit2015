<?php namespace Droit\User\Forms;

use Laracasts\Validation\FormValidator;

class UserCreation extends FormValidator {

    /**
     * Validation rules for event creation
     *
     * @var array
     */
    protected $rules = array(
        'prenom'                => 'required',
        'nom'                   => 'required',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|confirmed',
        'password_confirmation' => 'required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected $messages = array(
        'email.required'     => 'Le champ email est requis',
        'email.unique'       => 'Cet email est déjà utilisé',
        'email.email'        => 'Merci d\'indiquer un email valide',
        'prenom.required'    => 'Le champ prénom est requis',
        'nom.required'       => 'Le champ nom est requis',
        'password.required'  => 'Le champ mot de passe est requis',
        'password.confirmed' => 'Le mot de passe ne correspond pas'
    );

}