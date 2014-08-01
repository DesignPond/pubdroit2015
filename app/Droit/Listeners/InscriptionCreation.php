<?php namespace Droit\Listeners;

use Laracasts\Commander\Events\EventListener;
use Laracasts\Commander\CommanderTrait;
use Droit\Colloque\Events\InscriptionWasCreated;
use Droit\Colloque\Events\InscriptionWasUpdated;
use Droit\Colloque\Repo\ColloqueInterface;

class InscriptionCreation extends EventListener {

    use CommanderTrait;

    protected $colloque;

    /* Inject Repository */
    public function __construct(ColloqueInterface $colloque)
    {
        $this->colloque = $colloque;
    }

    public function whenInscriptionWasCreated(InscriptionWasCreated $event)
    {
        /* Update the colloque inscription number */
        $this->colloque->addInscription($event->inscription->colloque_id);
        /* Get type of colloque  */
        $type = $this->colloque->find($event->inscription->colloque_id)->type;

        if( $type == 1 || $type == 2)
        {
            $this->execute('Droit\Colloque\Commands\CreateFactureCommand',$event->inscription->toArray());
        }

        if( !$type == 0)
        {
            $this->execute('Droit\Colloque\Commands\GenerateDocumentCommand',array('inscription_id' => $event->inscription->id));
        }

        $data = ['inscription' => $event->inscription];

        \Mail::send('emails.inscription.create', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Inscription was created!!');
        });
    }

    public function whenInscriptionWasUpdated(InscriptionWasUpdated $event)
    {
        $data = ['inscription' => $event->inscription];

        \Mail::send('emails.inscription.update', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Inscription was updated!!');
        });
    }

}