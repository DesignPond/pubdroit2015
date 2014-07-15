<?php

use Droit\Repo\Price\PriceInterface;
use Droit\Service\Form\Price\PriceValidator as PriceValidator;

class PriceController extends BaseController {
	
	protected $price;
	
	public function __construct( PriceInterface $price )
	{		
		$this->price = $price;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('prices.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($event)
	{
        return View::make('admin.event.form.price_create')->with( array( 'event' => $event ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$priceValidator = PriceValidator::make(Input::all());
		
		$event_id = Input::get('event_id');
		
		if ($priceValidator->passes()) 
		{
			$this->price->create(Input::all());
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le prix a été crée' ) );
		}
		
		return Redirect::to('admin/pubdroit/price/create/'.$event_id)->withErrors( $priceValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('prices.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $price = $this->price->find($id);
		 
		 return View::make('admin.event.form.price_edit')->with( array('price' => $price) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$priceValidator = PriceValidator::make(Input::all());
		
		$event_id = Input::get('event_id');
		
		if ($priceValidator->passes()) 
		{
			$this->price->update(Input::all());
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le prix a été mis à jour') );
		}
		
		return Redirect::to('admin/pubdroit/price/'.$id.'/edit')->withErrors( $priceValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$event_id = $this->price->find($id)->event_id;

		if( $this->price->delete($id) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le prix a été supprimé') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}


}
