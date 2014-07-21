<?php namespace Droit\Event\Worker;

use Droit\Event\Worker\EventWorkerInterface;
use Droit\Event\Repo\EventInterface;
use Droit\Event\Repo\CompteInterface;
use Droit\Event\Repo\FileInterface;

class EventWorker implements EventWorkerInterface{

    protected $event;

    protected $file;

    protected $compte;

    private $documents;

	/**
	 * Instantiate
	 */
	public function __construct( EventInterface $event , CompteInterface $compte , FileInterface $file )
	{
        $this->event     = $event;

        $this->file      = $file;

        $this->compte    = $compte;

        $this->documents = array( 'images' => array('carte','vignette','badge','illustration'), 'docs' => array('programme','pdf','document') );
	}

    /**
     *  Get all infos for event view
     *
     * @return array
     */
    public function getInfoForEvent($id)
    {
        $event       = $this->event->find($id);
        $emailDefaut = $this->event->getEmail('inscription',"0");
        $comptes     = $this->compte->getAll()->lists('motifCompte', 'id');
        $comptes     = ['' => 'Choix'] + $comptes;
        $centers     = $this->file->getAllCenters();
        $allfiles    = $this->setFiles($event,$this->documents);

        return array(
            'event'       => $event,
            'centers'     => $centers,
            'comptes'     => $comptes,
            'emailDefaut' => $emailDefaut,
            'documents'   => $this->documents,
            'allfiles'    => $allfiles
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