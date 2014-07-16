<?php namespace Droit\Content\Repo;

interface AnalyseInterface {
	
	public function getAll($pid);
	public function getAllArrets($pid);
	public function analysesArretsById($array);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

