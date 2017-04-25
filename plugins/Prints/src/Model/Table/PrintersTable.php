<?php
namespace Prints\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Printers Model
 *
 * @property \Cake\ORM\Association\HasMany $Jobs
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \Prints\Model\Entity\Printer get($primaryKey, $options = [])
 * @method \Prints\Model\Entity\Printer newEntity($data = null, array $options = [])
 * @method \Prints\Model\Entity\Printer[] newEntities(array $data, array $options = [])
 * @method \Prints\Model\Entity\Printer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Prints\Model\Entity\Printer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Prints\Model\Entity\Printer[] patchEntities($entities, array $data, array $options = [])
 * @method \Prints\Model\Entity\Printer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrintersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->addBehavior('Prints.Lpadmin');


        parent::initialize($config);

        $this->setTable('printers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Jobs', [
            'foreignKey' => 'printer_id',
            'className' => 'Prints.Jobs'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'printer_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_printers',
            'className' => 'Prints.Users'
        ]);
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('month_count')
            ->allowEmpty('month_count');

        $validator
            ->boolean('allow')
            ->allowEmpty('allow');

        $validator
            ->integer('quota_period')
            ->allowEmpty('quota_period');

        $validator
            ->integer('page_limite')
            ->allowEmpty('page_limite');

        $validator
            ->integer('k_limit')
            ->allowEmpty('k_limit');

        $validator
            ->dateTime('modified')
            ->allowEmpty('modified');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
