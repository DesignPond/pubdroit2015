<?php namespace Droit\Repo\Subject;

interface SubjectInterface {
	
	public function getAll();
	public function find($id);
	public function arrangeCategories($data);
	public function create(array $data);
	public function update(array $data);
	
}

