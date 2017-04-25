<?php
namespace Prints\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Prints\Model\Behavior\LpadminBehavior;

/**
 * Prints\Model\Behavior\LpadminBehavior Test Case
 */
class LpadminBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Prints\Model\Behavior\LpadminBehavior
     */
    public $Lpadmin;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Lpadmin = new LpadminBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lpadmin);

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
