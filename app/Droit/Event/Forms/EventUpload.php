<?php namespace Droit\Event\Forms;

use Laracasts\Validation\FormValidator;

class EventUpload extends FormValidator {

    /**
     * Validation rules for event creation
     *
     * @var array
     */
    protected $rules = array(
        'file' => 'mimes:jpeg,bmp,png,pdf,xls.docx|required'
    );

    /**
     * Validation messages
     *
     * @var array
     */
    protected $messages = array(
        'file.required' => 'Choisissez un document ou image',
        'file.mimes'    => 'Le type de document n\'est pas supporté'
    );

}