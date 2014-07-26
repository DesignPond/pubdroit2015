<?php namespace Droit\Inscriptions\Worker;

interface InscriptionServiceInterface {
	
	public function inscriptionsForUser($user);
	public function inscriptionEssentials($inscriptions);
	
}

