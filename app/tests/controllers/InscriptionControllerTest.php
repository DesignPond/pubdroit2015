<?php

use Illuminate\Database\Eloquent\Collection;

class InscriptionControllerTest extends TestCase {
		
	protected $mock;
	
	protected $collection;
	
	protected $documents;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Inscription\InscriptionInterface');
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	    
	    $this->documents  = array( 'images' => array('carte','vignette','badge','illustration'), 'docs' => array('programme','pdf','document') );
	}
	 
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	 
	    $this->app->instance($class, $mock);
	 
	    return $mock;
	}
 	
	public function tearDown()
    {
    	\Mockery::close();
    }
    
	/**
	 * Event actifs index
	*/	 
	public function testInscriptionsList()
	{			
		$this->mock->shouldReceive('getEvent')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/inscription/event/4');
	    
	    $this->assertViewHas('inscriptions');
	}
					
}