<?php namespace Droit\Colloque\Repo;

interface FileInterface {
	
	public function getAllForColloque($colloque);
	public function getFilesColloque($colloque,$type);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
	
	/* File manipulation */
	public function directory_map($directory , array $extension);
	
	// Centers
	public function getAllCenters();
}

