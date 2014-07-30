<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Repo\InscriptionInfoInterface;
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Repo\OptionInterface;
use Droit\Colloque\Repo\FileInterface;
use Droit\Colloque\Worker\ColloqueInfosTrait;
use Droit\Colloque\Entities\Colloque_config as Colloque_config;


class DocumentWorker implements DocumentInterface {

    use ColloqueInfosTrait;

	protected $pdf;
	
	protected $colloque;

    protected $option;

    protected $files;

    protected $config;

	public function __construct(ColloqueInterface $colloque, OptionInterface $option , FileInterface $files)
	{
		$this->pdf      = \App::make('dompdf');
		
		$this->custom   = new \Custom;

        $this->config   = Colloque_config::where('colloque_id','=',0)->get();
		
		$this->colloque = $colloque;

        $this->option   = $option;

        $this->files    = $files;
		
	}
		
	/**
	 * Arrange infos for pdf for view
     *
	 * @return instance
	 */
	public function arrange($inscription,$document){

		// Get infos from inscription
		$colloque_id = $inscription->colloque_id;
        $colloque    = $this->colloque->find($colloque_id);
        $user        = $inscription->users;

        // No infos for user throw exeption
        if( !$user )
        {
            throw new \Droit\Exceptions\DocumentGeneratorException('Document generation failed', array('User not found'));
        }

        $data['inscription'] = $inscription->toArray();
        $data['colloque']    = $colloque->toArray();

        if( $document == 'bon')
        {
            $bon  = $this->getForBon($inscription,$colloque,$user);
            $data = array_merge($data,$bon);
        }

        if( $document == 'facture')
        {
            $facture  = $this->getForFacture($inscription,$colloque,$user);
            $data     = array_merge($data,$facture);
        }

        if( $document == 'bv')
        {
            $bv   = $this->getForBv($inscription,$colloque);
            $data = array_merge($data,$bv);
        }

        if( $document == 'attestation')
        {
            $attestation  = $this->getForAttestation($colloque,$user);
            $data         = array_merge($data,$attestation);
        }

		return $data;
	}

    /**
     * Return all infos for facture
     *
     * @return array mixed
     */
    public function getForFacture($inscription,$colloque,$user)
    {
        $price        = array('price' => $inscription->colloque_prices->price);
        $user         = $this->userInfos($user);
        $organisateur = $this->defaultInfosOrganisateur($colloque);

        return array_merge($organisateur,$user,$price);
    }


    /**
     * Return all infos for bv
     *
     * @return array mixed
     */
    public function getForBv($inscription,$colloque)
    {
        $price        = array('price' => $inscription->colloque_prices->price);
        $organisateur = $this->bvInfos($colloque);

        return array_merge($organisateur,$price);
    }

    /**
     * Return all infos for attestation
     *
     * @return array mixed
     */
    public function getForAttestation($colloque,$user)
    {
        $attestation  = ( !$colloque->colloque_attestations->isEmpty() ? $colloque->colloque_attestations->toArray() : array() );
        $attestation  = array( 'attestation' => $attestation);
        $user         = $this->userInfos($user);
        $organisateur = $this->defaultInfosOrganisateur($colloque);

        return array_merge($organisateur,$user,$attestation);
    }

    /**
     * Return all infos for bon
     *
     * @return array mixed
     */
    public function getForBon($inscription,$colloque,$user)
    {
        $options      = $this->option->findForUser($colloque->id,$inscription->users->id);
        $options      = array( 'options' => (!$options->isEmpty() ? $options->toArray():array()) );
        $user         = $this->userInfos($user);
        $organisateur = $this->defaultInfosOrganisateur($colloque);

        return array_merge($organisateur,$user,$options);
    }

    /**
     * Get infos for user
     *
     * @return array mixed
     */
    public function userInfos($user)
    {
        return array('user' => $user->toArray());
    }

    /**
     * Get defaults for bv
     *
     * @return array mixed
     */
    public function bvInfos($colloque)
    {
        $data['organisateur'] = $this->getOrganisateur($colloque);
        $data['compte']       = $this->getCompte($colloque);

        return $data;
    }

    /**
     * Get defaults for documents
     *
     * @return array mixed
     */
    public function defaultInfosOrganisateur($colloque)
    {
        $data['logo']         = $this->getLogo($colloque);
        $data['organisateur'] = $this->getOrganisateur($colloque);
        $data['carte']        = $this->getCarte($colloque->id);
        $data['compte']       = $this->getCompte($colloque);

        return $data;
    }

	/**
	 * generate pdf
	 * *
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