<?php namespace Droit\Event\Repo;

interface OptionInterface {
	
	public function getAll();
	public function find($id);
	public function findForUser($user);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
}

