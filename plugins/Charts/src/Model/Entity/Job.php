<?php
namespace Charts\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $printer_id
 * @property \Cake\I18n\Time $date
 * @property int $pages
 * @property int $copies
 * @property string $host
 * @property string $file
 * @property string $params
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \Charts\Model\Entity\User $user
 * @property \Charts\Model\Entity\Printer $printer
 */
class Job extends Entity
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
