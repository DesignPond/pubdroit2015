<?php namespace Droit\Inscriptions\Worker;

use Droit\Inscriptions\Worker\InscriptionServiceInterface;
use Droit\Inscriptions\Repo\InscriptionInterface;
use Droit\Event\Repo\OptionInterface;
use Droit\Event\Repo\FileInterface;

class InscriptionServiceWorker implements InscriptionServiceInterface {

	protected $inscription;	
	
	protected $options;
	
	protected $file;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct( FileInterface $file , InscriptionInterface $inscription, OptionInterface $options )
	{
	
		$this->inscription = $inscription;
		
		$this->option      = $options;
		
		$this->file        = $file;
		
	}

	public function inscriptionsForUser($user){
		
		$data = array();
		
		$inscriptions = $this->inscription->getForUser($user);
		
		// get essentials
		$essentials   = $this->inscriptionEssentials($inscriptions);		
		$options      = $this->option->findForUser($user);
		
		$data['inscriptions'] = $inscriptions;
		$data['options']      = $options;
		
		return array_merge($essentials,$data);

	}
	
	public function inscriptionEssentials($inscriptions){
		
		$vignettes    = array();	
		$events       = $inscriptions->lists('event_id','id');
		
		if(!empty($events))
		{
			$vignettes    = $this->file->getFilesEvent($events,'vignette')->lists('filename','event_id');
		}		
		
		$docs = array(
			'Bon'         => 'pdfbon',
			'Facture'     => 'pdffacture',
			'BV'          => 'bv',
			'Rappel'      => 'pdfrappel',
			'Attestation' => 'attestation',
		);

        return  array( 'vignettes' => $vignettes , 'docs' => $docs );
        
	}

}