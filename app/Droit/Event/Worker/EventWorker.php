<?php namespace Droit\Event\Worker;

use Droit\User\Worker\EventWorkerInterface;

class EventWorker implements EventWorkerInterface{

	/**
	 * Instantiate 
	 */
	public function __construct()
	{
		
	}
	
		
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