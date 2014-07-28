<?php

class InscriptionEloquentTest extends TestCase
{

    protected $mock;

    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('Droit\Colloque\Repo\InscriptionInterface');
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * Create new number for inscription
     */
    public function testCreateNewNumberForInscriptions()
    {
        $repo   = new \Droit\Colloque\Repo\InscriptionEloquent(new \Droit\Colloque\Entities\Colloque_inscriptions);
        $actual = $repo->newNumber(5,2);

        $year = date('Y');

        $expect = '2-'.$year.'/6';

        $this->assertEquals($expect, $actual);

    }

    public function tearDown()
    {
        \Mockery::close();
    }
}