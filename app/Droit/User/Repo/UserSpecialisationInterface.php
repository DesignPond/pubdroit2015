<?php namespace Droit\Repo\UserSpecialisation;

interface UserSpecialisationInterface {
	
	public function find($specialisation,$adresse_id);
	public function addToUser($specialisation,$adresse_id);
	public function delete($id);
	
}