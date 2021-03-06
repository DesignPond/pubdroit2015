<?php namespace Droit\Colloque\Commands;

class UpdateInscriptionCommand {

    public $id;

    public $colloque_id;

    public $colloque_price_id;

    public $user_id;

    public function __construct( $id, $colloque_id, $colloque_price_id, $user_id)
    {
        $this->id                 = $id;
        $this->colloque_id        = $colloque_id;
        $this->colloque_price_id  = $colloque_price_id;
        $this->user_id            = $user_id;
    }

}