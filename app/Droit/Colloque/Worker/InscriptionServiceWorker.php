<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Worker\InscriptionServiceInterface;
use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Repo\OptionInterface;
use Droit\Colloque\Repo\FileInterface;

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
		$colloques       = $inscriptions->lists('colloque_id','id');
		
		if(!empty($colloques))
		{
			$vignettes    = $this->file->getFilesColloque($colloques,'vignette')->lists('filename','colloque_id');
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