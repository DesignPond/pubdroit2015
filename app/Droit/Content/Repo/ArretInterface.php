<?php namespace Droit\Content\Repo;

interface ArretInterface {
	
	public function getAll($pid);
	public function getAllList($pid, $column);
	public function find($id);
	public function droplistByCol($col);
	public function getYears($pid);
	public function isMain($arrets);
	public function create(array $data);
	public function update(array $data);
	
}

