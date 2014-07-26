<?php namespace Droit\User\Events;

use Droit\User\Entities\User;

class UserWasCreated {

    public $user;

    public function __construct(User $user) /* or pass in just the relevant fields */
    {
        $this->user = $user;
    }

}