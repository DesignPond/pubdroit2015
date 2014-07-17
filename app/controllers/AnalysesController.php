<?php

use Droit\Content\Repo\AnalyseInterface;
use Droit\Content\Repo\ArretInterface;
use Droit\Content\Repo\CategorieInterface;
use Droit\Service\Worker\UploadInterface;

use Droit\Service\Form\Analyses\AnalysesValidator as AnalysesValidator;

class AnalysesController extends BaseController {

	protected $categorie;
	
	protected $analyse;
	
	protected $arret;
	
	protected $upload;
	
	private $pids;
	
	public function __construct( ArretInterface $arret , CategorieInterface $categorie , AnalyseInterface $analyse , UploadInterface $upload ){
		
		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;

		$this->arret      = $arret;
		
		$this->upload     = $upload;
		
		$this->pids = Config::get('common.pid');			
							
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
		$file = false;	
		
		$link = $this->pids[Input::get('pid')];
		
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
		
		$data['file'] = ($file ? $file['name'] : '' );
		
		if( $this->analyse->create( $data ) ) 
		{
			
			return Redirect::to('admin/'.$link.'/analyses')->with( array('status' => 'success' , 'message' => 'Analyse crée') ); 
		}
		
		return Redirect::back()->withErrors( $this->analyse->errors() )->withInput( Input::all() ); 
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

		// Get pid		
		$link = $this->pids[Input::get('pid')];
		
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
				
		// Files upload
		if( Input::file('file') )
		{
			$file = $this->upload->upload( Input::file('file') , 'files/analyses' );				
			$data['file'] = ($file ? $file['name'] : '' );
		}				
	
		if( $this->analyse->update( $data ) ) 
		{
			
			return Redirect::to('admin/'.$link.'/analyses')->with( array('status' => 'success' , 'message' => 'Analyse mise à jour') ); 
		}
		
		return Redirect::back()->withErrors( $this->analyse->errors() )->withInput( Input::all() ); 
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