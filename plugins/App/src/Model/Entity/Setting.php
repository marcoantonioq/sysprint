<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property int $id
 * @property bool $app_status
 * @property bool $app_debug
 * @property string $app_title
 * @property string $app_locale
 * @property string $app_dateformtar
 * @property bool $app_https
 * @property bool $app_auth
 * @property bool $ad_conect
 * @property string $ad_host
 * @property int $ad_port
 * @property string $ad_dn
 * @property string $ad_user
 * @property string $ad_pass
 * @property string $ad_suffix
 * @property string $ad_attr
 * @property string $ad_filter
 * @property bool $mail_conect
 * @property string $mail_transport
 * @property string $mail_title
 * @property string $mail_from
 * @property string $mail_host
 * @property int $mail_port
 * @property int $mail_timeout
 * @property string $mail_username
 * @property string $mail_password
 * @property string $mail_charset
 */
class Setting extends Entity
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
