<?php namespace Droit\Colloque\Repo;

interface InscriptionInterface {
	
	public function getAll();
	public function find($id);
	public function getLast($nbr);
	public function getEvent($event);
	public function getForUser($user);	
	public function newNumber();
	public function create(array $data);
	public function update(array $data);
	
}

