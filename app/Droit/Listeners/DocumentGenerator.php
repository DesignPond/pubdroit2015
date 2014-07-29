<?php namespace Droit\Listeners;

use Laracasts\Commander\Events\EventListener;
use Laracasts\Commander\CommanderTrait;
use Droit\Colloque\Events\FactureWasCreated;
use Droit\Colloque\Repo\ColloqueInterface;

class DocumentGenerator extends EventListener {

    use CommanderTrait;

    protected $colloque;

    /* Inject Repository */
    public function __construct(ColloqueInterface $colloque)
    {
        $this->colloque = $colloque;
    }

    public function whenFactureWasCreated(FactureWasCreated $event)
    {
        $data = ['facture' => $event->facture];

        \Mail::send('emails.inscription.facture', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Facture was created!!');
        });
    }

}