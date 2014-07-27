<?php namespace Droit\Colloque\Forms;

use Laracasts\Validation\FormValidator;

class ColloqueUpload extends FormValidator {

    /**
     * Validation rules for event creation
     *
     * @var array
     */
    protected $rules = array(
        'file' => 'mimes:jpeg,bmp,png,pdf|required'
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