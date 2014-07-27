<?php namespace Droit\Colloque\Repo;

use Droit\Colloque\Repo\FileInterface;
use Droit\Colloque\Entities\Colloque_files as Colloque_files;

class FileEloquent implements FileInterface {

	protected $file;
	
	// Class expects an Eloquent model
	public function __construct(Colloque_files $file)
	{
		$this->file = $file;	

	}
	
	/*
	 * CRUD functions
	*/
	public function getAllForColloque($colloque){
		
		return $this->file->where('colloque_id','=', $colloque)->get();		
	}
	
	public function getAllCenters(){
				
		$root  = getcwd().'/centers';
		
		return $this->directory_map( $root , array('png','jpg') );
	}
	
	public function getFilesColloque($colloque,$type){
		
		if( is_array($colloque)  )
		{
			return $this->file->where('type','=', $type)->whereIn('colloque_id', $colloque )->get();
		}
		
		return $this->file->where('type','=', $type)->where('colloque_id','=', $colloque)->get();
	}
		
	public function find($id){
		
		return $this->file->findOrFail($id);			
	}
	
	public function create(array $data){

		$file = $this->file->create(array(
			'filename'    => $data['filename'],
			'type'        => $data['type'],
			'colloque_id' => $data['colloque_id']
		));
		
		if( ! $file )
		{
			return false;
		}
		
		return true;

	}
	
	public function update(array $data){
		
		$file = $this->file->findOrFail($data['id']);	
		
		if( ! $file )
		{	
			return false;
		}
		
		$file->filename     = $data['filename'];
		$file->type         = $data['type'];
		$file->colloque_id  = $data['colloque_id'];
		
		$file->save();	
		
		return true;
	}	
	
	public function delete($id){
	
		$file = $this->file->find($id);

		return $file->delete();		
	}
	
	/* File manipulation */
	public function directory_map($directory , array $extension){
		
		$list = array();
		
		$list = array_filter(glob($directory.'/*', GLOB_BRACE),'is_file');
		
		$files = array();
		
		if(!empty($list))
		{
			foreach($list as $file)
			{
				
				$explode  = explode( '/' , $file );
				$end      = array_pop($explode);
				$name     = explode( '.' , $end );
				$center   = array_shift($name);					
				$ext      = array_pop($name);
				
				if( in_array($ext, $extension))
				{
					$files[] = $center; 
				}
			}
		}
		
		return $files;
		
	}
	
}

