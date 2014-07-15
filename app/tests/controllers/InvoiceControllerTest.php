<?php

use Illuminate\Database\Eloquent\Collection;

class InvoiceControllerTest extends TestCase {
		
	protected $mock;
	
	protected $collection;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Invoice\InvoiceInterface');
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
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
	public function testInvoicesList()
	{			
		$this->mock->shouldReceive('getEvent')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/invoice/event/4');
	    
	    $this->assertViewHas('invoices');
	}
					
}