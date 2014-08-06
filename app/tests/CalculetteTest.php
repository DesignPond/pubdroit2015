<?php

class CalculetteTest extends TestCase
{

    protected $mock;

    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('Droit\Calculette\Repo\CalculetteInterface');
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
    public function testGetTheActualIndice()
    {
        $calculette = new \Droit\Calculette\Repo\CalculetteEloquent (
                          new \Droit\Calculette\Entities\Calculette_taux,
                          new \Droit\Calculette\Entities\Calculette_ipc
                      );

        $actual = $calculette->ipc_actuel();

        $expect = '159.50';

        $this->assertEquals($expect, $actual);

    }

    public function tearDown()
    {
        \Mockery::close();
    }
}