<?php namespace Droit\Repo\Seminaire;

use Droit\Repo\Seminaire\SeminaireInterface;
use Illuminate\Database\Eloquent\Model as M;

class SeminaireEloquent implements SeminaireInterface {

	protected $seminaire;
	
	// Class expects an Eloquent model
	public function __construct(M $seminaire)
	{
		$this->seminaire = $seminaire;	
	}
	
	public function getAll(){
	
		return $this->seminaire->with( array('seminaires_subjects') )->orderBy('year', 'DESC')->get();	
	}
	
	public function droplistByCol($col){
	
		return $this->seminaire->where('deleted','=',0)->orderBy($col, 'DESC')->lists($col, 'id');
	}
	
	public function find($id){
		
		return $this->seminaire->where('id','=',$id)->with( array('seminaires_subjects') )->get();	
	}
	
	public function categories(){
    
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}