<?php namespace Droit\Repo\BSCategorie;

use Droit\Repo\BSCategorie\BSCategorieInterface;
use Illuminate\Database\Eloquent\Model as M;

class BSCategorieEloquent implements BSCategorieInterface{

	protected $arret;
	
	// Class expects an Eloquent model
	public function __construct(M $categorie)
	{
		$this->categorie = $categorie;
	}
	
	public function getAll( $pid ){
	
		return $this->categorie->where('pid','=',$pid)->where('deleted','=',0)->get();
	}
	
	public function find($id){
		
		return $this->categorie->findOrFail($id);	
	}
			
	public function categories($categories){
	
		$arrange = array();
		
		$categories  = $categories->toArray();
		
		foreach($categories as $categorie)
		{
			$arrange[$categorie['id']] = $categorie;
		}
		
		return $arrange;		
	}
			
	public function droplist($pid)
	{		
		return $this->categorie->where('pid','=',$pid)->where('deleted','=',0)->lists('title', 'id');
	}
	
	public function droplistByCol($pid,$col){
	
		return $this->categorie->where('pid','=',$pid)->where('deleted','=',0)->lists($col, 'id');
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}