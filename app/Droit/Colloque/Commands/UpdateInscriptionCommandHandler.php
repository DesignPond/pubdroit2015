<?php namespace Droit\Colloque\Commands;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Repo\ColloqueInterface;

class UpdateInscriptionCommandHandler implements CommandHandler {

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

        /* Update inscription with infos */
        $inscription = $this->inscription->update(
            array(
                'id'                => $command->id,
                'colloque_id'       => $command->colloque_id,
                'colloque_price_id' => $command->colloque_price_id,
                'user_id'           => $command->user_id
            )
        );

        /* Dispatch all events  */
        $this->dispatchEventsFor($inscription);

        return $inscription;
    }

}