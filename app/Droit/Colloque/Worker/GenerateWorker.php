<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Repo\PriceInterface;
use Droit\Colloque\Repo\CompteInterface;
use Droit\Colloque\Repo\FileInterface;
use Droit\User\Repo\UserInfoInterface;

class GenerateWorker implements GenerateInterface {
	
	protected $pdf;
	
	protected $price;
	
	protected $compte;
	
	protected $files;
	
	protected $colloque;

	public function __construct(PriceInterface $price , CompteInterface $compte ,FileInterface $files , UserInfoInterface $user)
	{
		//$this->pdf    = \App::make('dompdf');
		
		//$this->custom = new \Custom;
		
		$this->price  = $price;
		
		$this->compte = $compte;
		
		$this->files  = $files;
		
		$this->user   = $user;
		
	}
		
	/*
	 * Arrange infos for pdf for view 
	 * @return instance
	*/		
	public function arrange($colloque, $user, $infos, $options , $attestation = NULL){

		// Get infos from colloque
		$colloque_id = $colloque->id;
		$config      = $colloque->colloque_config;
		$files       = $colloque->files;
		
		// Options for bon
		$data['options']      = ( !$options->isEmpty() ? $options->toArray() : array() );	
		// attestation
		$data['attestation']  = ( $attestation ? $attestation->toArray() : array() );
		
		// infos for user
		if( !$user->inscription->isEmpty() )
		{
			
			$inscription          = $user->inscription->first()->toArray();
			$user_infos           = $user->adresses->first()->toArray();
			$organisateur         = (!empty($config) ? $config->toArray() : $infos->first()->toArray());
			
			$data['civilite']     = $this->custom->whatCivilite($user_infos['civilite']);
			
			$data['compte']       = $this->getCompte($colloque);		
			$data['price']        = $this->getPrice($inscription);
			
			$data['organisateur'] = $organisateur;	
			$data['user']         = $user_infos;
			$data['inscription']  = $inscription;
			$data['colloque']     = $colloque->toArray();
			
			$data['logo']         = $this->getLogo($colloque , $infos , $config); 
			$data['carte']        = $this->getMap($colloque_id); 
			
			return $data;
		}
		
		return array();	
			
	}
	
	private function getMap($colloque_id){
			
		$image = '';
			
		// Map for bon
		$map = $this->files->getFilesColloque($colloque_id,'carte')->first();
		
		if( $map )
		{
			$carte  = $map->toArray();
			$image  = getcwd().'/files/carte/'.$carte['filename'];			
		}
		
		return $image;
		
	}
	
	private function getLogo($colloque , $infos , $config){
		
		$image = '';	
		
		$colloque_id = $colloque->id;
				
		if( !$infos->isEmpty() )
		{
			$infos = $infos->first()->toArray();		
		}
		
		// Logo for organisator
		$vignette  = $this->files->getFilesColloque($colloque_id,'badge');		
		
		// Logos for the pdfs
		if( ! $vignette->isEmpty() )
		{
			$logo  = $vignette->first()->toArray();
			$image = getcwd().'/files/badge/'.$logo['filename'];  
		}
		else if(!empty($config))
		{
			$logo = $config->toArray();
			$image = getcwd().'/images/'.$logo['logo'];  
		}
		else if(isset($infos['logo']))
		{
			$image = getcwd().'/images/'.$infos['logo']; 
		}
		else
		{
			$image = getcwd().'/images/logos/facdroit.jpg'; 
		}
		
		return $image;
		
	}
	
	private function getPrice($inscription){
		
		// inscription price
		$idprice     = $inscription['Colloque_price_id'];
		$price       = $this->price->find($idprice)->toArray();
		
		if($price)
		{
			return $this->price->find($idprice)->toArray();
		}
		
		return array();
		
	}
	
	private function getCompte($colloque){
	
		// Factures info if exist
		$compte_id   = $colloque->compte_id;
		
		if($compte_id)
		{
			return $this->compte->find($compte_id)->toArray();
		}
		
		return array();
	}
		
	/*
	 * generate pdf 
	 * @return instance
	*/	
	public function generate($view , $data , $name , $path , $write = NULL){
		
		$pdf = $this->pdf->loadView($view , $data);
		
		if($write)
		{
			return $pdf->save( getcwd().'/files/'.$path.'/'.$name.'.pdf');
		}
		else
		{
			return $pdf->download( $name.'.pdf');
		}
				
	}

}