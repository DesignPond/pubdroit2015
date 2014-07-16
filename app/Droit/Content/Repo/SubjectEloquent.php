<?php namespace Droit\Content\Repo;

use Droit\Content\Repo\SubjectInterface;
use Droit\Content\Entities\Subjects as M;

class SubjectEloquent implements SubjectInterface {

	protected $subject;
	
	// Class expects an Eloquent model
	public function __construct(M $subject)
	{
		$this->subject = $subject;	
	}
	
	public function getAll(){
	
		return $this->subject->with( array('subjects_seminaires','subjects_authors','subjects_categories'=> function($query)
		{
		    $query->orderBy('bs_categories.sorting', 'ASC');
		  
		}) )->where('deleted', '=' , 0)->get();	
	}
	
	public function find($id){
		
		return $this->subject->where('id','=',$id)->with( array('subjects_authors') )->get();	
	}
	
	public function arrangeCategories($data){
		
		$categories = array();
		
		if( !empty($data) )
		{			
			foreach($data as $subject)
			{
				$cats = $subject->subjects_categories->toArray();
							
				foreach($cats as $cat)
				{
					$categories[$cat['title']][] = $subject;
				}	
			}				
		}
		
		return $categories;
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}