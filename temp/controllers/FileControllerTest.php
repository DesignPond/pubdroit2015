<?php

class FileControllerTest extends TestCase {
	
	protected $mock;
	
	protected $upload;
	
	protected $file;
	
	protected $media;
			
	public function setUp()
	{
		parent::setUp();
		
		$this->mock   = $this->mock('Droit\Repo\File\FileInterface');
		
		$this->upload = $this->mock('Droit\Service\Upload\UploadInterface');
		
		$this->file = array(
			'destination' => 'files/temp/',
			'event_id'    => 1,
			'typeFile'    => 'carte'
		);		
				
		// stub for the file uploaded
		$this->media = new \Symfony\Component\HttpFoundation\File\UploadedFile( getcwd().'/public/files/temp/foo.jpg' ,'foo.jpg' );
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
	 * Upload file and validation pass
	*/	 
	public function testUploadFilePassAndValidationPass()
	{	
		// upload the file and it's ok
		$this->upload->shouldReceive('upload')->once()->andReturn(true);
		
		// put the file in the db for the event
		$this->mock->shouldReceive('create')->once();
	    
	    // post all infos, from form and file as third param
		$this->call('POST', 'admin/pubdroit/event/upload', $this->file , array('file' => $this->media) );
 
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit');
	}
	
	/**
	 * Upload file fails
	*/	 
	public function testUploadFileFails()
	{	
		// upload the file and it fails
		$this->upload->shouldReceive('upload')->once()->andReturn(false);
	    
	    // post all infos, from form and file as third param
		$this->call('POST', 'admin/pubdroit/event/upload', $this->file , array('file' => $this->media) );
 
		$this->assertRedirectedTo('admin/pubdroit/event/1/edit', array('status' => 'danger'));
	}
	
	
	/**
	 * Upload file pass and validation fails
	*/	 
	public function testUploadFilePassAndValidationFail()
	{			
		// upload the file and it's ok
		$this->upload->shouldReceive('upload')->once()->andReturn(true);
	    
	    // post all infos, from form and file as third param
		$this->call('POST', 'admin/pubdroit/event/upload', array() , array('file' => $this->media) );
 
		$this->assertRedirectedTo('admin/pubdroit/event//edit', array('status' => 'danger'));
	}
	
}