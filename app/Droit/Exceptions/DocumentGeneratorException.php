<?php namespace Droit\Exceptions;

class DocumentGeneratorException extends \Exception {

    /**
     * @var mixed
     */
    protected $errors;

    /**
     * @param string $message
     * @param mixed  $errors
     */
    function __construct($message, $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    /**
     * Get upload errors
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

}