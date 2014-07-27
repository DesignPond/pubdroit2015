<?php namespace Droit\Colloque\Worker;

interface GenerateInterface{
	
	/*
	 * upload selected file 
	 * @return array
	*/	
	public function generate($view , $data , $name, $path , $write = NULL);	
	
	public function arrange($event, $user, $options , $infos);
	
}