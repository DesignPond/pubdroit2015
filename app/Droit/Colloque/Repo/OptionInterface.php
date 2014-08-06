<?php namespace Droit\Colloque\Repo;

interface OptionInterface {
	
	public function getAll();
	public function find($id);
	public function findForUser($colloque_id,$user_id);
    public function findAllOptionsForUser($user_id);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
}

