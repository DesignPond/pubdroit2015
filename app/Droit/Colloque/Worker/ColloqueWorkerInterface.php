<?php namespace Droit\Colloque\Worker;

interface ColloqueWorkerInterface {

    public function getInfoForColloque($id);
	// Files	
	public function setFiles($list,$documents);	
	
}

