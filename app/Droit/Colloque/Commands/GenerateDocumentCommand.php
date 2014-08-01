<?php namespace Droit\Colloque\Commands;

class GenerateDocumentCommand {

    /**
     * @var string
     */
    public $inscription_id;

    /**
     * Constructor
     *
     * @param string inscription_id
     */
    public function __construct($inscription_id)
    {
        $this->inscription_id = $inscription_id;
    }

}