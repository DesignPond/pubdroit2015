<?php namespace Droit\Colloque\Repo;

interface InvoiceInterface {
	
	public function find($id);
	public function getEvent($event);	
	
	public function create(array $data);
	public function update(array $data);
	
}

