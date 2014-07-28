<?php namespace Droit\Colloque\Events;

use Droit\Colloque\Entities\Colloque_inscriptions;

class InscriptionWasUpdated {

    public $inscription;

    public function __construct(Colloque_inscriptions $inscription) /* or pass in just the relevant fields */
    {
        $this->inscription = $inscription;
    }

}