<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Worker\ColloqueWorkerInterface;
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Repo\CompteInterface;
use Droit\User\Repo\SpecialisationInterface;
use Droit\Colloque\Repo\FileInterface;

class ColloqueWorker implements ColloqueWorkerInterface{

    protected $colloque;

    protected $file;

    protected $compte;

    protected $specialisation;

    private $documents;

	/**
	 * Instantiate
	 */
	public function __construct( ColloqueInterface $colloque , CompteInterface $compte  , FileInterface $file , SpecialisationInterface $specialisation)
	{

        $this->colloque  = $colloque;

        $this->file      = $file;

        $this->compte    = $compte;

        $this->specialisation  = $specialisation;

        $this->documents = array(
                'images'    => \Config::get('common.images'),
                'documents' => \Config::get('common.documents')
            );

	}

    /**
     *  Get all infos for colloque view
     * @return array
     */
    public function getInfoForColloque($id)
    {
        $colloque       = $this->colloque->find($id);
        $comptes        = $this->compte->getAll()->lists('motif', 'id');
        $comptes        = ['' => 'Choix'] + $comptes;
        $centers        = $this->file->getAllCenters();
        $allfiles       = $this->setFiles($colloque,$this->documents);

        return array(
            'colloque'       => $colloque,
            'centers'        => $centers,
            'comptes'        => $comptes,
            'documents'      => $this->documents,
            'allfiles'       => $allfiles
        );
    }

    /**
     * Set array of documents by file type
     */
	public function setFiles($list,$documents){
		
		$arranged = array();
		$files    = $list->colloque_files;
		
		foreach($documents as $type => $docs)
		{
			foreach($files as $file)
			{
				if(in_array($file->type,$docs))
				{
					$arranged[$type][$file->type] = $file;
				}
			}
		}

		return $arranged;
	}



}