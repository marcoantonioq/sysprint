<?php
namespace Prints\Test\TestCase\Form;

use Cake\TestSuite\TestCase;
use Prints\Form\SpoolForm;

/**
 * Prints\Form\SpoolForm Test Case
 */
class SpoolFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Prints\Form\SpoolForm
     */
    public $Spool;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Spool = new SpoolForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spool);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
