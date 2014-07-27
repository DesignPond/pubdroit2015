<?php namespace Droit\Colloque\Repo;

interface PriceInterface {
	
	public function getAll($event);
	public function find($id);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
}

