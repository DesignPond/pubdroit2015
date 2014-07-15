<?php namespace Droit\Event\Repo;

interface InvoiceInterface {
	
	public function find($id);
	public function getEvent($event);	
	
	public function create(array $data);
	public function update(array $data);
	
}

