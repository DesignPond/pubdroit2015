<?php namespace Droit\User\Repo;

interface SpecialisationInterface {
	
	public function getAll();
	public function droplist();
	public function find($id);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
	public function linkColloque($data);
	public function unlinkColloque($id);
	
}