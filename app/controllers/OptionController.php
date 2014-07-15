<?php

use Droit\Repo\Option\OptionInterface;
use Droit\Service\Form\Option\OptionValidator as OptionValidator;

class OptionController extends BaseController {

	protected $option;
	
	public function __construct( OptionInterface $option )
	{		
		$this->option     = $option;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($event)
	{
        return View::make('admin.event.form.option_create')->with( array( 'event' => $event ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$optionValidator = OptionValidator::make(Input::all());
		
		$event_id = Input::get('event_id');
		
		if ($optionValidator->passes()) 
		{
			$this->option->create(Input::all());
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'L\'option à été crée' ) );
		}
		
		return Redirect::to('admin/pubdroit/option/create/'.$event_id)->withErrors( $optionValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $option = $this->option->find($id);
		 
		 return View::make('admin.event.form.option_edit')->with( array('option' => $option) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$optionValidator = OptionValidator::make(Input::all());
		
		$event_id = Input::get('event_id');
		
		if ($optionValidator->passes()) 
		{
			$this->option->update(Input::all());
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'L\'option à été mise à jour') );
		}
		
		return Redirect::to('admin/pubdroit/option/'.$id.'/edit')->withErrors( $optionValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$event_id = $this->option->find($id)->event_id;

		if( $this->option->delete($id) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'L\'option à été supprimée') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
