<?php namespace Droit\Colloque\Worker;

use Droit\Colloque\Entities\Colloque_config as Colloque_config;

trait ColloqueInfosTrait {

    /**
     * Fetch path of map for bon (document) if there is one
     *
     * @return string
     */
    public function getCarte($colloque_id)
    {
        // Map for bon
        $map = $this->files->getFilesColloque($colloque_id,'carte')->first();

        if( !$map )
        {
            return false;
        }

        return getcwd().'/files/carte/'.$map->filename;
    }

    /**
     * Get infos for organisateur
     *
     * @return array mixed
     */
    public function getOrganisateur($colloque)
    {
        $config  = $colloque->colloque_config;

        return (!$config->isEmpty() ? $config->toArray() : $this->config->toArray());
    }

    /**
     * Get infos for organisateur
     *
     * @return array mixed
     */
    public function getCompte($colloque){

        return ( $colloque->colloque_compte ? $colloque->colloque_compte->toArray() : array() );
    }

    /**
     * Fetch path of logo organisateur for documents
     *
     * @return string
     */
    public function getLogo($colloque){

        $vignette  = $this->files->getFilesColloque($colloque->id,'badge')->first();

        if( $vignette )
        {
            $image = getcwd().'/files/badge/'.$vignette->filename;
        }
        else if( !$colloque->colloque_config->isEmpty() )
        {
            $image = getcwd().'/images/'.$colloque->colloque_config->logo;
        }
        else if( !$this->config->isEmpty() )
        {
            $image = getcwd().'/images/'.$this->config->first()->logo;
        }
        else
        {
            $image = getcwd().'/images/logos/facdroit.jpg';
        }

        return $image;

    }

    /**
     * Array of documents to generate for the colloque
     *
     * @return array mixed
     */
    public function whichDocumentsToGenerate($type)
    {
        switch ($type)
        {
            case 0:
                return false;
                break;
            case 1:
                return array('facture','bon','bv');
                break;
            case 2:
                return array('facture','bv');
                break;
            case 3:
                return array('bon');
                break;
        }
    }

}