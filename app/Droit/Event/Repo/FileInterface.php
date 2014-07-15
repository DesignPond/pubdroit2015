<?php namespace Droit\Event\Repo;

interface FileInterface {
	
	public function getAllForEvent($event);
	public function getFilesEvent($event,$type);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
	
	/* File manipulation */
	public function directory_map($directory , array $extension);
	
	// Centers
	public function getAllCenters();
}

