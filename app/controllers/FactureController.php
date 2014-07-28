<?php

use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Repo\FactureInterface;

class FactureController extends BaseController {

	protected $inscription;
	
	protected $colloque;
	
	protected $facture;
	
	public function __construct( InscriptionInterface $inscription , FactureInterface $facture , ColloqueInterface $colloque )
	{
		
		$this->inscription = $inscription;
		
		$this->colloque    = $colloque;
		
		$this->facture     = $facture;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.factures.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.factures.create');
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
	
	public function colloque($id){
		
		$colloque = $this->colloque->find($id);
		$factures = $this->facture->getColloque($id);
		
		return View::make('admin.factures.index')->with( array('factures' => $factures , 'colloque' => $colloque ));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.factures.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.factures.edit');
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
