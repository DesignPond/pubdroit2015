<?php namespace Droit\Colloque\Commands;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Repo\ColloqueInterface;

class CreateInscriptionCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $inscription;

    protected $colloque;

    /* Inject Repository */
    public function __construct( InscriptionInterface $inscription , ColloqueInterface $colloque)
    {
        $this->inscription = $inscription;

        $this->colloque    = $colloque;
    }

    public function handle($command)
    {
        /* Get nbr of inscription from colloque  */
        $inscrits = $this->colloque->find($command->colloque_id)->inscriptions;

        /* Create new inscription number  */
        $numero   = $this->inscription->newNumber($inscrits,$command->colloque_id);

        /* Create inscription with infos */
        $inscription = $this->inscription->create(
            array(
                'colloque_id'       => $command->colloque_id,
                'colloque_price_id' => $command->colloque_price_id,
                'user_id'           => $command->user_id,
                'numero'            => $numero
            )
        );

        /* Dispatch all events  */
        $this->dispatchEventsFor($inscription);

        return $inscription;
    }

}