<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SettingsFixture
 *
 */
class SettingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'app_status' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_debug' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_title' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'app_locale' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'app_dateformtar' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'app_https' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_auth' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ad_conect' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'ad_host' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_port' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '389', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ad_dn' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_user' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_pass' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_suffix' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_attr' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ad_filter' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_conect' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'mail_transport' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => 'Smtp', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_title' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_from' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_host' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_port' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '465', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mail_timeout' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '30', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mail_username' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_password' => ['type' => 'string', 'length' => 455, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_charset' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'app_status' => 1,
            'app_debug' => 1,
            'app_title' => 'Lorem ipsum dolor sit amet',
            'app_locale' => 'Lorem ipsum dolor sit amet',
            'app_dateformtar' => 'Lorem ipsum dolor sit amet',
            'app_https' => 1,
            'app_auth' => 1,
            'ad_conect' => 1,
            'ad_host' => 'Lorem ipsum dolor sit amet',
            'ad_port' => 1,
            'ad_dn' => 'Lorem ipsum dolor sit amet',
            'ad_user' => 'Lorem ipsum dolor sit amet',
            'ad_pass' => 'Lorem ipsum dolor sit amet',
            'ad_suffix' => 'Lorem ipsum dolor sit amet',
            'ad_attr' => 'Lorem ipsum dolor sit amet',
            'ad_filter' => 'Lorem ipsum dolor sit amet',
            'mail_conect' => 1,
            'mail_transport' => 'Lorem ipsum dolor sit amet',
            'mail_title' => 'Lorem ipsum dolor sit amet',
            'mail_from' => 'Lorem ipsum dolor sit amet',
            'mail_host' => 'Lorem ipsum dolor sit amet',
            'mail_port' => 1,
            'mail_timeout' => 1,
            'mail_username' => 'Lorem ipsum dolor sit amet',
            'mail_password' => 'Lorem ipsum dolor sit amet',
            'mail_charset' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
