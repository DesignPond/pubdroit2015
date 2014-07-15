<?php namespace Droit\Service\Inscription;

interface InscriptionServiceInterface {
	
	public function inscriptionsForUser($user);
	public function inscriptionEssentials($inscriptions);
	
}

