<?php

use Droit\Event\Repo\PriceInterface;

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

        $event_id = Input::get('event_id');

        $price = $this->price->create(
               Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le prix a été crée' ) );

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

        $event_id = Input::get('event_id');

        $price = $this->price->update(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le prix a été mis a jour') );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $message = ( $this->price->delete($id) ? array('status' => 'success','message' => 'Le prix a été supprimé') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}

}