<?php namespace Droit\Event\Repo;

interface EventInterface {
	
	public function getActifs();
	public function getArchives();
	public function find($id);
	public function getLast($nbr);	
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

    // Emails
	public function getEmail($type,$event);
	public function createEmail($data);
    public function updateEmail($data);
	
	// Attestations	
	public function getAttestation($event);
	public function createAttestation($data);
    public function updateAttestation($data);
	
}

