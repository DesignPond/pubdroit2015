<?php namespace Droit\Colloque\Events;

use Droit\Colloque\Entities\Colloque_factures;

class FactureWasCreated {

    public $facture;

    public function __construct(Colloque_factures $facture) /* or pass in just the relevant fields */
    {
        $this->facture = $facture;
    }

}