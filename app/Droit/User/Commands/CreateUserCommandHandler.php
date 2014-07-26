<?php namespace Droit\User\Commands;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Droit\User\Repo\UserInfoInterface;

class CreateUserCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $user;

    /* Inject Repository */
    public function __construct( UserInfoInterface $user )
    {
        $this->user = $user;
    }

    public function handle($command)
    {
        /* Create user with infos */
        $user = $this->user->create(array('prenom' => $command->prenom, 'nom' => $command->nom, 'email' => $command->email, 'password' => $command->password));

        /* Dispatch all events  */
        $this->dispatchEventsFor($user);

        return $user;
    }

}