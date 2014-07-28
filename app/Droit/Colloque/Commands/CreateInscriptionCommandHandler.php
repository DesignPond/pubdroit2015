<?php namespace Droit\Colloque\Commands;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Droit\Colloque\Repo\InscriptionInterface;

class CreateInscriptionCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $inscription;

    /* Inject Repository */
    public function __construct( InscriptionInterface $inscription )
    {
        $this->inscription = $inscription;
    }

    public function handle($command)
    {
        /* fake number */
        $numero = '5-2014/5';
        /* Create inscription with infos */
        $inscription = $this->inscription->create(
            array(
                'colloque_id'       => $command->colloque_id,
                'colloque_price_id' => $command->colloque_price_id,
                'user_id'           => $command->user_id,
                'numero'            => ''
            )
        );

        /* Dispatch all events  */
        $this->dispatchEventsFor($inscription);

        return $inscription;
    }

}