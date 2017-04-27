<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \App\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setting findOrCreate($search, callable $callback = null, $options = [])
 */
class SettingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Prints.Lpadmin');

        $this->setTable('settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('app_status')
            ->allowEmpty('app_status');

        $validator
            ->boolean('app_debug')
            ->allowEmpty('app_debug');

        $validator
            ->allowEmpty('app_title');

        $validator
            ->allowEmpty('app_locale');

        $validator
            ->allowEmpty('app_dateformtar');

        $validator
            ->boolean('app_https')
            ->allowEmpty('app_https');

        $validator
            ->boolean('app_auth')
            ->allowEmpty('app_auth');

        $validator
            ->boolean('ad_conect')
            ->allowEmpty('ad_conect');

        $validator
            ->allowEmpty('ad_host');

        $validator
            ->integer('ad_port')
            ->allowEmpty('ad_port');

        $validator
            ->allowEmpty('ad_dn');

        $validator
            ->allowEmpty('ad_user');

        $validator
            ->allowEmpty('ad_pass');

        $validator
            ->allowEmpty('ad_suffix');

        $validator
            ->allowEmpty('ad_attr');

        $validator
            ->allowEmpty('ad_filter');

        $validator
            ->boolean('mail_conect')
            ->allowEmpty('mail_conect');

        $validator
            ->allowEmpty('mail_transport');

        $validator
            ->allowEmpty('mail_title');

        $validator
            ->allowEmpty('mail_from');

        $validator
            ->allowEmpty('mail_host');

        $validator
            ->integer('mail_port')
            ->allowEmpty('mail_port');

        $validator
            ->integer('mail_timeout')
            ->allowEmpty('mail_timeout');

        $validator
            ->allowEmpty('mail_username');

        $validator
            ->allowEmpty('mail_password');

        $validator
            ->allowEmpty('mail_charset');

        return $validator;
    }
}
