<?php
namespace AuthUser\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $rule
 * @property string $email
 * @property string $adress
 * @property string $thumbnailphoto
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \AuthUser\Model\Entity\Produto[] $produtos
 */
class User extends Entity
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

    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    public function ldapSetEntries($userAD=array(), $password = null)
    {
        if(empty($userAD['0']['displayname']['0']))
            return null;

        $Users = TableRegistry::get('Users');        
        $user_id = $Users->findByUsername( $userAD['0']['name']['0'] )->first()['id'];
        if($user_id) {
            $this->id = $user_id;            
        }
        if($password) {
            $this->password = $password;
        }
        $this->adress = "Endereço";
        $this->email = @$userAD['0']['mail']['0'];
        $this->name = @$userAD['0']['displayname']['0'];
        // $this->rule = "user";
        $this->status = 1;
        $this->username = $userAD['0']['name']['0'];
        
        // $finfo = new finfo(FILEINFO_MIME_TYPE);
        @$mime = explode(';', finfo_buffer($userAD['0']['thumbnailphoto']['0']));
        // $this->thumbnailphoto = "data:image/jpeg;base64," . base64_encode($userAD['0']['thumbnailphoto']['0']);
        // if (!empty($userAD['0']['memberof']['count']) && $userAD['0']['memberof']['count'] >= 1) {
        //     foreach ($userAD['0']['memberof'] as $group) {
        //         foreach (explode(',',$group) as $CNs) {
        //             $cn=explode('=',$CNs);
        //             if($cn[0]=="CN"){
        //                 @$user['Group']['Group'][]=$cn[1];
        //             }
        //         }
        //     }
        // }
        $Users->save($this);
        return $this;
    }
}
