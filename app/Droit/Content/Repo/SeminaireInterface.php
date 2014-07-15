<?php namespace Droit\Repo\Seminaire;

interface SeminaireInterface {
	
	public function getAll();
	public function find($id);
	public function droplistByCol($col);
	public function categories();
	public function create(array $data);
	public function update(array $data);
	
}

