<?php
/**
 * Test Controller
 */

use Droit\Admin\Repo\SearchInterface;

/**
 * Test Controller
 * A controller for testing misc
 */
class TestController extends BaseController {

	protected $search;

    /**
     * Protected user columns for search
     */
    protected $usersearch;

    /**
     * Protected address columns for search
     */
    protected $addresssearch;

	public function __construct( SearchInterface $search){

        $this->search = $search;

        $this->usersearch    = \Config::get('common.usersearch');

        $this->addresssearch = \Config::get('common.addresssearch');

	}
	
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{		
		$string = "Hi! <script src='http://www.evilsite.com/bad_script.js'></script> It's a good day!";

        list($terms, $search) = $this->search->prepareSearch($string);

		return View::make('test.index')->with(array('terms' => $terms, 'search' => $search , 'user' => $this->usersearch));
	}

}
