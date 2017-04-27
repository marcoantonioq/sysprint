<?php
namespace Prints\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Prints\Model\Table\PrintersTable;

/**
 * Prints\Model\Table\PrintersTable Test Case
 */
class PrintersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Prints\Model\Table\PrintersTable
     */
    public $Printers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.prints.printers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Printers') ? [] : ['className' => 'Prints\Model\Table\PrintersTable'];
        $this->Printers = TableRegistry::get('Printers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Printers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
