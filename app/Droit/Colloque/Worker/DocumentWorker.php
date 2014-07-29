<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Repo\InscriptionInfoInterface;
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Repo\OptionInterface;

class DocumentWorker implements DocumentInterface {
	
	protected $pdf;
	
	protected $colloque;

    protected $inscription;

    protected $option;

	public function __construct(ColloqueInterface $colloque, InscriptionInfoInterface $inscription, OptionInterface $option)
	{
		$this->pdf    = \App::make('dompdf');
		
		$this->custom = new \Custom;
		
		$this->colloque    = $colloque;
		
		$this->inscription = $inscription;

        $this->option      = $option;
		
	}
		
	/*
	 * Arrange infos for pdf for view 
	 * @return instance
	*/		
	public function arrange($inscription){

		// Get infos from inscription
		$colloque_id = $inscription->colloque_id;
        $user_id     = $inscription->user_id;

        $colloque    = $this->colloque->find($colloque_id);
        $user        = $this->user->find($user_id);
        $options     = $this->option->findForUser($colloque_id,$user_id);

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