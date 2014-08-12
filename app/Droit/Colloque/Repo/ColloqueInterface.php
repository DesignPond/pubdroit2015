<?php namespace Droit\Colloque\Repo;

interface ColloqueInterface {
	
	public function getActifs();
	public function getArchives();
	public function find($id);
	public function getLast($nbr);	
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
    public function addInscription($id);

    public function addSpecialisation($specialisation,$colloque_id);
    public function removeSpecialisation($specialisation,$colloque_id);

    // Emails
	public function getEmail($type,$colloque);
	public function createEmail($data);
    public function updateEmail($data);
	
	// Attestations	
	public function getAttestation($colloque);
	public function createAttestation($data);
    public function updateAttestation($data);
	
}

