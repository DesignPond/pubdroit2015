<?php namespace Droit\Content\Repo;

interface SeminaireInterface {
	
	public function getAll();
	public function find($id);
	public function droplistByCol($col);
	public function categories();
	public function create(array $data);
	public function update(array $data);
	
}

