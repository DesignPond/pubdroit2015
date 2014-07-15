<?php namespace Droit\Repo\Categorie;

interface CategorieInterface {
	
	public function getAll($pid);
	public function find($id);
	public function droplist($pid);
	public function droplistByCol($pid,$col);
	public function categories($categories);
	public function create(array $data);
	public function update(array $data);
	
}

