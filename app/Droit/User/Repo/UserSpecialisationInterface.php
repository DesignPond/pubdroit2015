<?php namespace Droit\User\Repo;

interface UserSpecialisationInterface {
	
	public function find($specialisation,$adresse_id);
	public function delete($id);
	
}