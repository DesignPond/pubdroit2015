<?php
use Illuminate\Database\Eloquent\Collection;

class UserSpecialisationTest extends TestCase {

	protected $mock;
	
	protected $collection;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Colloque\Repo\UserSpecialisationInterface');
	    
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
	 * add specialisation to user the user doesn't have the specialisation already
	*/	 
	public function testAddSpecialisationToUser()
	{	
		$this->mock->shouldReceive('find')->once()->andReturn(false);
		
		$this->mock->shouldReceive('create')->once()->andReturn(true);
	    
		$this->call('POST', 'admin/adresses/specialisation', array( 'specialisation_id' => 1 , 'adresse_id' => 2) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'success' ));	
	}
	
	/**
	 * add specialisation to user the user already has the specialisation
	*/	 
	public function testAddSpecialisationToUserAlready()
	{	
		$this->mock->shouldReceive('find')->once()->andReturn(true);
	    
		$this->call('POST', 'admin/adresses/specialisation', array( 'specialisation_id' => 1 , 'adresse_id' => 2) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'danger' ));	
	}
	
	/**
	 * add specialisation to user the user doesn't have the specialisation already
	*/	 
	public function testRemoveSpecialisationPass()
	{	
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
	    
		$this->call('get', 'admin/adresses/removeSpecialisation', array( 'id' => 1 ) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'success' ));	
	}
	
	/**
	 * add specialisation to user the user doesn't have the specialisation already
	*/	 
	public function testRemoveSpecialisationFails()
	{	
		$this->mock->shouldReceive('delete')->once()->andReturn(false);
	    
		$this->call('get', 'admin/adresses/removeSpecialisation', array( 'id' => 1 ) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'success' ));	
	}	
}