<?php namespace Droit\Colloque\Repo;

interface CompteInterface {
	
	public function getAll();
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

