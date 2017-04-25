<?php
namespace Prints\Model\Entity;

use Cake\ORM\Entity;

/**
 * Printer Entity
 *
 * @property int $id
 * @property string $name
 * @property int $month_count
 * @property string $local
 * @property string $descrition
 * @property bool $allow
 * @property bool $status
 * @property string $ip
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $quota_period
 * @property int $page_limite
 * @property int $k_limit
 * @property \Cake\I18n\Time $updated_quota
 */
class Printer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}
