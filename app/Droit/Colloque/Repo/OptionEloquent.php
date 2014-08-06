<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\OptionInterface;
use Droit\Colloque\Entities\Colloque_options as Colloque_options;

class OptionEloquent implements OptionInterface {
	
	protected $option;
	
	// Class expects an Eloquent model
	public function __construct(Colloque_options $option)
	{
		$this->option = $option;	
	}
	
	public function getAll(){
		
		return $this->option->all();		
	}

    public function findForUser($colloque_id,$user_id){

        return $this->option->join('colloque_option_user','colloque_options.id','=','colloque_option_user.colloque_option_id')
            ->where('colloque_option_user.user_id', '=' ,$user_id)
            ->where('colloque_options.colloque_id', '=' ,$colloque_id)
            ->get();
    }

	public function findAllOptionsForUser($user_id){
	
		return $this->option->join('colloque_option_user','colloque_options.id','=','colloque_option_user.colloque_option_id')
							->where('colloque_option_user.user_id', '=' ,$user_id)
							->get();
	}
	
	public function find($id){
	
		return $this->option->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$option = $this->option->find($id);

		return $option->delete();
		
	}
	
	public function create(array $data)
	{
		$option = $this->option->create(array(
			'titre'       => $data['titre'],
			'type'        => $data['type'],
			'colloque_id' => $data['colloque_id']
		));
		
		if( ! $option )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$option = $this->option->findOrFail($data['id']);	
		
		if( ! $option )
		{	
			return false;
		}
		
		$option->titre        = $data['titre'];
		$option->colloque_id  = $data['colloque_id'];
		
		if( isset($data['type']) )
		{
			$option->type   = $data['type'];
		}
		
		$option->save();	
		
		return true;		
	}
	
}