<?php

use Illuminate\Database\Eloquent\Collection;

class SpecialisationsControllerTest extends TestCase {
		
	protected $mock;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\User\Repo\SpecialisationInterface');
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
	 * Specialisations index
	*/	 
	public function testIndex()
	{	
		$c = new Collection(
			array( 
				(object) array('id' => 1, 'titre' => 'Specialisation name'),
				(object) array('id' => 2, 'titre' => 'Specialisation2 name')
			)
		);
		
		$this->mock->shouldReceive('getAll')->once()->andReturn($c);
			       
	    $this->get('admin/pubdroit/specialisation');
	    
	    $this->assertViewHas('specialisations');
	}

	/**
	 * Specialisation edit
	*/	 	
	public function testEdit()
	{			
		// mock what repository has to do and return an object for the view
		$this->mock->shouldReceive('find')
				   ->with(1)
			       ->once()
			       ->andReturn( (object)array('id'=>1, 'titre'=>'Specialisation name'));
		
		$crawler = $this->client->request('GET', 'admin/pubdroit/specialisation/1/edit');
		
		$this->assertTrue($this->client->getResponse()->isOk()); 
		
		$this->assertViewHas('specialisation');
	}
	
	/**
	 * Specialisation create
	*/	 
	public function testCreate()
	{		
		$response = $this->get('admin/pubdroit/specialisation/create');
		
		$this->assertResponseOk();		
	}

		
	public function testStoreNewSpecialisationPasseValidation(){
		
		$input = array( 'titre' => 'new');
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
	    
		$this->call('POST', 'admin/pubdroit/specialisation', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/specialisation');
	}
/*
	public function testStoreNewSpecialisationFailVaidation(){

        $input = array( 'titre' => '');

        // the validation should fail
        $this->mock->shouldReceive('create')->once();

		$this->call('POST', 'admin/pubdroit/specialisation', $input);

		// the validation should fail and redirect back
		$this->assertRedirectedTo('admin/pubdroit/specialisation/create');
        $this->assertSessionHasErrors();
	}	*/
	
}