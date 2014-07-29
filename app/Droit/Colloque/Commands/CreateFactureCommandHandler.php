<?php namespace Droit\Colloque\Commands;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Droit\Colloque\Repo\FactureInterface;
use Droit\Colloque\Repo\ColloqueInterface;

class CreateFactureCommandHandler implements CommandHandler {

    use DispatchableTrait;

    protected $facture;

    protected $colloque;

    /* Inject Repository */
    public function __construct( FactureInterface $facture , ColloqueInterface $colloque)
    {
        $this->facture  = $facture;

        $this->colloque = $colloque;
    }

    public function handle($command)
    {

        /* Insert facture from inscription infos */

        $facture = $this->facture->create(
            array(
                'colloque_id'        => $command->colloque_id,
                'user_id'            => $command->user_id,
                'colloque_price_id'  => $command->colloque_price_id,
                'numero'             => $command->numero,
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
            )
        );

        /* Dispatch all events  */
        $this->dispatchEventsFor($facture);

        return $facture;
    }

}