<?php

use Droit\Content\Repo\ArretInterface;
use Droit\Content\Repo\AnalyseInterface;
use Droit\Content\Repo\SeminaireInterface;
use Droit\Content\Repo\SubjectInterface;
use Droit\Content\Repo\CategorieInterface;
use Droit\Service\Repo\UploadInterface;

//use Droit\Service\Form\Arrets\ArretsValidator as ArretsValidator;

class ArretsController extends BaseController {

	protected $arret;
	
	protected $categorie;
	
	protected $analyse;
	
	protected $seminaire;
	
	protected $subject;	

	protected $upload;
	
	public function __construct(ArretInterface $arret,CategorieInterface $categorie,AnalyseInterface $analyse,SeminaireInterface $seminaire,SubjectInterface $subject,UploadInterface $upload)
	{
		
		$this->arret      = $arret;

		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;
		
		$this->seminaire  = $seminaire;
		
		$this->subject    = $subject;	
				
		$this->upload     = $upload;				
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		
		$allarrets    = $this->arret->getAll(195);
		$categories   = $this->categorie->getAll(195);
		$allanalyses  = $this->analyse->getAll(195);
			
		return View::make('admin.arrets.index');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($pid)
	{
		$categories = $this->categorie->getAll($pid);
		
        return View::make('admin.arrets.create')->with( array( 'pid' => $pid , 'categories' => $categories ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// arrange infos
		$pid = Input::get('pid');

		// Get pid
		if( $pid == 195 ){ $link = 'bail'; }
		if( $pid == 207 ){ $link = 'matrimonial'; }	
		
		// Files upload
		if( Input::file('file') )
		{
			$file = $this->upload->upload( Input::file('file') , 'files/arrets' );
		}
			
		if( Input::file('analysis') )
		{
			$analysis = $this->upload->upload( Input::file('analysis') , 'files/analyses' );
		}					
		
		// Data array							
		$data = array(
			  'pid'        => $pid,
			  'cruser_id'  => Input::get('cruser_id'),
			  'reference'  => Input::get('reference'),
			  'pub_date'   => Input::get('pub_date'),
			  'abstract'   => Input::get('abstract'),
			  'categories' => Input::get('categories'),
			  'pub_text'   => Input::get('pub_text')
		);
		
		if($file)    { $data['file']     = $file['name']; }
		if($analysis){ $data['analysis'] = $analysis['name']; }
		
		// Init arrt validator
		$arretsValidator = ArretsValidator::make( Input::all() );
		
		if ($arretsValidator->passes()) 
		{
			$this->arret->create( $data );
			
			return Redirect::to('admin/'.$link.'/arrets')->with( array('status' => 'success' , 'message' => 'Arrêt crée') ); 
		}
		
		return Redirect::back()->withErrors( $arretsValidator->errors() )->withInput( Input::all() ); 

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$arret      = $this->arret->find($id)->first();
		$pid        = $arret->pid;
		$categories = $this->categorie->getAll($pid);
		
        return View::make('admin.arrets.show')->with( array( 'arret' => $arret , 'categories' => $categories) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	

}
