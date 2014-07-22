<?php namespace Droit\Event\Worker;

use Droit\Event\Worker\EventWorkerInterface;
use Droit\Event\Repo\EventInterface;
use Droit\Event\Repo\CompteInterface;
use Droit\User\Repo\SpecialisationInterface;
use Droit\Event\Repo\FileInterface;

class EventWorker implements EventWorkerInterface{

    protected $event;

    protected $file;

    protected $compte;

    protected $specialisation;

    private $documents;

	/**
	 * Instantiate
	 */
	public function __construct( EventInterface $event , CompteInterface $compte  ,FileInterface $file , SpecialisationInterface $specialisation)
	{
        $this->event     = $event;

        $this->file      = $file;

        $this->compte    = $compte;

        $this->specialisation  = $specialisation;

        $this->documents = array( 'images' => array('carte','vignette','badge','illustration'), 'docs' => array('programme','pdf','document') );
	}

    /**
     *  Get all infos for event view
     *
     * @return array
     */
    public function getInfoForEvent($id)
    {
        $event          = $this->event->find($id);
        $default        = $this->event->getEmail('inscription', 0);
        $comptes        = $this->compte->getAll()->lists('motifCompte', 'id');
        $comptes        = ['' => 'Choix'] + $comptes;
        $centers        = $this->file->getAllCenters();
        $specialisation = $this->specialisation->getAll()->lists('titreSpecialisation', 'id');
        $specialisation = ['' => 'Choix'] + $specialisation;
        $allfiles       = $this->setFiles($event,$this->documents);

        return array(
            'event'          => $event,
            'centers'        => $centers,
            'specialisation' => $specialisation,
            'comptes'        => $comptes,
            'default'        => $default,
            'documents'      => $this->documents,
            'allfiles'       => $allfiles
        );
    }

    /**
     * Set array of documents by file type
     */
	public function setFiles($list,$documents){
		
		$arranged = array();
		$files    = $list->files;
		
		foreach($documents as $type => $docs)
		{
			foreach($files as $file)
			{
				if(in_array($file->typeFile,$docs))
				{
					$arranged[$type][$file->typeFile] = $file;
				}
			}
		}

		return $arranged;
	}

}