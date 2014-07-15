<?php

use Illuminate\Database\Eloquent\Collection;

class EventControllerTest extends TestCase {
		
	protected $mock;
	
	protected $collection;
	
	protected $documents;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Event\EventInterface');
	    
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
	public function testActifEventList()
	{			
		$this->mock->shouldReceive('getActifs')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/lists');
	    
	    $this->assertViewHas('events');
	}
   
	/**
	 * Event archive index
	*/	 
	public function testArchivesEventList()
	{			
		$this->mock->shouldReceive('getArchives')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/archives');
	    
	    $this->assertViewHas('events');
	}
	
	/**
	 * Event create
	*/	 
	public function testCreateNewEvent()
	{		
		$response = $this->get('admin/pubdroit/event/create');
		
		$this->assertResponseOk();		
	}
	
	/**
	 * Store new event pass validation
	*/
	public function testStoreNewEventValidationPass(){
	
		$input = array(
			'organisateur'   => 'Faculté de droit Neuchâtel',
			'titre'          => 'Titre de test archive',
			'sujet'          => 'Sujet de archive',
			'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
			'dateDebut'      => '2013-11-01',
			'dateDelai'      => '2013-10-21'
		);
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
		// mock new event
		$new = $this->collection->add((object) array('id' => 2));
		// Get last id inserted from new mocked event
		$this->mock->shouldReceive('getLast')->with(1)->once()->andReturn($new);
	    
		$this->call('POST', 'admin/pubdroit/event', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/event/2/edit');
	
	}
	
	/**
	 * Store new event fails validation
	*/
	public function testStoreNewEventValidationFails(){
	
		$input = array();
	    
		$this->call('POST', 'admin/pubdroit/event', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/event/create');
	
	}
	
	/**
	 * Edit event
	*/	
	public function testEditEvent(){
		
		// mock an event with relations
		$event = (object) array(
			'id'     => 1, 
			'prices' => $this->collection, 
			'event_options'         => $this->collection,
			'event_specialisations' => $this->collection 
		);
		
		// mock event
		$this->mock->shouldReceive('find')->with(1)->once()->andReturn($event);		
		$this->mock->shouldReceive('getEmail')->with('inscription',"0")->once()->andReturn( array() );		
		$this->mock->shouldReceive('setFiles')->once()->andReturn( array() );
			       
	    $this->get('admin/pubdroit/event/1/edit');
	    
	    $this->assertViewHas('event');

	}
	
	/**
	 * Update event validation pass
	*/	
	public function testUpdateEventValidationPass(){
		
		$input = array(
			'id'             => 1,
			'organisateur'   => 'Faculté de droit Neuchâtel',
			'titre'          => 'Titre de test archive',
			'sujet'          => 'Sujet de archive',
			'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
			'dateDebut'      => '2013-11-01',
			'dateDelai'      => '2013-10-21'
		);
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('update')->once();
	    
		$this->call('PUT', 'admin/pubdroit/event/1', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit' , array('status' => 'success' ) );

	}	
	
	/**
	 * Update event validation fails
	*/	
	public function testUpdateEventValidationFails(){
		
		$input = array();
	    
		$this->call('PUT', 'admin/pubdroit/event/1', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit', array('status' => 'danger' ));
		
		$this->assertSessionHasErrors();

	}	
	
	/**
	 * Update email text for event pass validation
	*/	
	public function testUpdateEventEmailTextValidationPass(){
		
		$input = array( 'event_id' => 1 , 'message' => 'Lorem ipsum');
				
		// the validation should pass and call create on the event repo
		$this->mock->shouldReceive('createEmail')->once();
	    
		$this->call('POST', 'admin/pubdroit/event/email', $input);
		
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit', array('status' => 'success' ));

	}	
	
	/**
	 * Update email text for event validation fails
	*/	
	public function testUpdateEventEmailTextValidationFails(){
		
		$input = array( 'event_id' => 1 );
	    
		$this->call('POST', 'admin/pubdroit/event/email', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit', array('status' => 'danger' ));
		
		$this->assertSessionHasErrors();

	}	
	
	/**
	 * Destroy event ok
	*/
	public function testDestroyEventPass(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
		  
		$this->call('DELETE', 'admin/pubdroit/event/1');
		
		$this->assertRedirectedTo('admin/pubdroit/event', array('status' => 'success' ));
	
	}
	
	/**
	 * Destroy event fails
	*/
	public function testDestroyEventFails(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(false);
		  
		$this->call('DELETE', 'admin/pubdroit/event/1');
		
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit', array('status' => 'danger' ));
	
	}
					
}