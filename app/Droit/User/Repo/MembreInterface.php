<?php namespace Droit\User\Repo;

interface MembreInterface {
	
	public function getAll();
	public function find($id);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
}