<?php namespace Droit\Content\Repo;

interface AuteurInterface {
	
	public function getAll();
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

