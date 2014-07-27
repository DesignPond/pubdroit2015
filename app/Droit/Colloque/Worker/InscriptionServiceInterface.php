<?php namespace Droit\Colloque\Worker;

interface InscriptionServiceInterface {
	
	public function inscriptionsForUser($user);
	public function inscriptionEssentials($inscriptions);
	
}

