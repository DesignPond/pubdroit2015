<?php

use Droit\Content\Repo\ArretInterface;
use Droit\Content\Repo\AnalyseInterface;
use Droit\Content\Repo\CategorieInterface;


class MatrimonialController extends BaseController {

	protected $arret;
	
	protected $categorie;
	
	protected $analyse;
	
	public function __construct( ArretInterface $arret, CategorieInterface $categorie, AnalyseInterface $analyse )
	{
		
		$this->arret      = $arret;

		$this->categorie  = $categorie;

		$this->analyse    = $analyse;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('matrimonial.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('matrimonial.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}
	
	public function test()
	{
		$arrets  = $this->analyse->getAll(207);
   
    	return View::make('matrimonial.test')->with( array( 'arrets' => $arrets) );	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('matrimonial.show');
	}
	
		
	public function jurisprudence(){

		$arrets     = $this->arret->getAll(207);
		$categories = $this->categorie->getAll(207);
		$cat_list   = $this->categorie->droplist(207);
		$analyses   = $this->analyse->getAll(207);
		
		$arrArrange = $this->arret->isMain($arrets);
			
		$categories = $this->categorie->categories($categories);
   
    	return View::make('matrimonial.jurisprudence')->with( array( 'arrets' => $arrArrange, 'analyses' => $analyses, 'categories' => $categories, 'cat_list' => $cat_list));	
	}
	
	/*==============================================
		ADMINISTRATION FUNCTIONS
	===============================================*/

	/**
	 * Show list of arrets for admin
	 *
	 * @return Response
	 */
	public function arrets()
	{
		$arrets     = $this->arret->getAll(207);
		$categories = $this->categorie->getAll(207);
		$analyses   = $this->analyse->getAllArrets(207);
		$arrange    = $this->analyse->analysesArretsById($analyses);
   
    	return View::make('admin.arrets.index')->with( array( 'arrets' => $arrets , 'categories' => $categories , 'analyses' => $arrange , 'pid' => 207 ) );	
	}
	
	/**
	 * Show list of analyses for admin
	 *
	 * @return Response
	 */
	public function analyses()
	{
		$arrets     = $this->arret->getAll(207);
		$categories = $this->categorie->getAll(207);
		$analyses   = $this->analyse->getAll(207);
   
    	return View::make('admin.analyses.index')->with( array( 'arrets' => $arrets , 'categories' => $categories , 'analyses' => $analyses , 'pid' => 207 ) );	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('matrimonials.edit');
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
