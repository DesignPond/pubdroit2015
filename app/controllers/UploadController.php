<?php

use Droit\Service\File\FileInterface;

class UploadController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$destination = Input::get('destination');
    	
    	return $this->file->upload( Input::file('file') , $destination );
	}

}
