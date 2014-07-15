<?php

use Droit\Repo\Analyse\AnalyseInterface;
use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Categorie\CategorieInterface;
use Droit\Service\Upload\UploadInterface;

use Droit\Service\Form\Analyses\AnalysesValidator as AnalysesValidator;

class AnalysesController extends BaseController {

	protected $categorie;
	
	protected $analyse;
	
	protected $arret;
	
	protected $upload;
	
	public function __construct( ArretInterface $arret , CategorieInterface $categorie , AnalyseInterface $analyse , UploadInterface $upload ){
		
		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;

		$this->arret      = $arret;
		
		$this->upload     = $upload;			
							
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($pid)
	{
		$categories = $this->categorie->getAll($pid);
		$arrets     = $this->arret->getAllList( $pid, 'reference' );
		
        return View::make('admin.analyses.create')->with( array( 'pid' => $pid , 'categories' => $categories , 'arrets' => $arrets  ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// arrange infos
		$pid  = Input::get('pid');
		$file = false;

		// Get pid
		if( $pid == 195 ){ $link = 'bail'; }
		if( $pid == 207 ){ $link = 'matrimonial'; }	
		
		// Files upload
		if( Input::file('file') )
		{
			$file = $this->upload->upload( Input::file('file') , 'files/analyses' );
		}				
		
		// Data array							
		$data = array(
			  'pid'        => $pid,
			  'cruser_id'  => Input::get('cruser_id'),
			  'authors'    => Input::get('authors'),
			  'pub_date'   => Input::get('pub_date'),
			  'abstract'   => Input::get('abstract'),
			  'categories' => Input::get('categories'),
			  'arrets'     => Input::get('arrets'),
			  'pub_text'   => Input::get('pub_text')
		);
		
		if($file) { $data['file'] = $file['name']; } else { $data['file'] = ''; }
		
		// Init arrt validator
		$analysesValidator = AnalysesValidator::make( Input::all() );
		
		if ($analysesValidator->passes()) 
		{
			$this->analyse->create( $data );
			
			return Redirect::to('admin/'.$link.'/analyses')->with( array('status' => 'success' , 'message' => 'Analyse crée') ); 
		}
		
		return Redirect::back()->withErrors( $analysesValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $analyse    = $this->analyse->find($id)->first();
        $pid        = $analyse->pid;
		$categories = $this->categorie->getAll($pid);
		$arrets     = $this->arret->getAllList( $pid, 'reference' );
		
        return View::make('admin.analyses.show')->with( array( 'analyse' => $analyse , 'categories' => $categories , 'arrets' => $arrets ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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