<?php namespace Droit\Calculette\Repo;

interface CalculetteInterface {
	
	public function calculer($canton, $date , $loyer);
	public function calcul($canton, $date_depart, $loyer_actuel);
	public function taux_depart($date_depart,$canton);
	public function taux_actuel();
	public function taux_date_actuel();
	public function ipc_depart($date_depart);
	public function ipc_actuel();
	public function ipc_date_actuel();
	
}

