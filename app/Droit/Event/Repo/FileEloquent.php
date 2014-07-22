<?php namespace Droit\Event\Repo;

use Droit\Event\Repo\FileInterface;
use Droit\Event\Entities\Event_files as M;

class FileEloquent implements FileInterface {

	protected $file;
	
	// Class expects an Eloquent model
	public function __construct(M $file)
	{
		$this->file = $file;	

	}
	
	/*
	 * CRUD functions
	*/
	public function getAllForEvent($event){
		
		return $this->file->where('event_id','=', $event)->get();		
	}
	
	public function getAllCenters(){
				
		$root  = getcwd().'/centers';
		
		return $this->directory_map( $root , array('png','jpg') );
	}
	
	public function getFilesEvent($event,$type){
		
		if( is_array($event)  )
		{
			return $this->file->where('typeFile','=', $type)->whereIn('event_id', $event )->get();
		}
		
		return $this->file->where('typeFile','=', $type)->where('event_id','=', $event)->get();			
	}
		
	public function find($id){
		
		return $this->file->findOrFail($id);			
	}
	
	public function create(array $data){

		$file = $this->file->create(array(
			'filename'  => $data['filename'], 
			'typeFile'  => $data['typeFile'],
			'event_id'  => $data['event_id']
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
		
		$file->filename  = $data['filename'];
		$file->typeFile  = $data['typeFile'];
		$file->event_id  = $data['event_id'];
		
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

