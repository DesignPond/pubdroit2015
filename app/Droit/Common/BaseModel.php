<?php namespace Droit\Common;

use Eloquent;

class BaseModel extends Eloquent{
	
	protected $errors;
	
	/**
	 *  Boot into save hook of model
	 */
	public static function boot(){
		
		parent::boot();
		
		static::saving(function($model)
		{			
			return $model->validate();			
		});
		
		static::creating(function($model) 
		{
			static::setNullWhenEmpty($model);
			return true;
		});

	}
	
	/**
	 * Set empty values to null during creation
	 */
	private static function setNullWhenEmpty($model)
	{
		foreach ($model->toArray() as $name => $value) {
			if (empty($value)) {
				$model->{$name} = null;
			}
		}
	}
	
	/**
	 *  Validate the attributes from model
	 */
	public function validate(){
	
		$validator = \Validator::make($this->getAttributes() , static::$rules , static::$messages);
	
		if( $validator->fails() )
		{
		 	$this->errors = $validator->messages();
		 	
		 	return false;
		}
	
		return true;	
	}
	
	/**
	 *  Return the errors
	 */
	public function getErrors(){
		
		return $this->errors;
	}

}