<?php namespace Droit\Event\Worker;

interface InscriptionServiceInterface {
	
	public function inscriptionsForUser($user);
	public function inscriptionEssentials($inscriptions);
	
}

