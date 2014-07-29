<?php namespace Droit\Colloque\Commands;

class CreateFactureCommand {

    public $colloque_id;

    public $colloque_price_id;

    public $user_id;

    public $numero;

    public function __construct( $colloque_id, $colloque_price_id, $user_id, $numero)
    {
        $this->colloque_id        = $colloque_id;
        $this->colloque_price_id  = $colloque_price_id;
        $this->user_id            = $user_id;
        $this->numero             = $numero;
    }

}