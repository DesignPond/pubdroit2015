<?php namespace Droit\Colloque\Repo;

interface FactureInterface {
	
	public function find($id);
	public function getColloque($event);
	
	public function create(array $data);
	public function update(array $data);
	
}

