<?php namespace Droit\Colloque\Worker;

interface DocumentInterface{
	
	/*
	 * Generate divers documents for events or users
	 * @return array
	*/	
	public function generate($view , $data , $name, $path , $write = NULL);	
	
	public function arrange($inscription);
	
}