<?php
namespace Charts\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Printers
 *
 * @method \Charts\Model\Entity\Job get($primaryKey, $options = [])
 * @method \Charts\Model\Entity\Job newEntity($data = null, array $options = [])
 * @method \Charts\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \Charts\Model\Entity\Job|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Charts\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Charts\Model\Entity\Job[] patchEntities($entities, array $data, array $options = [])
 * @method \Charts\Model\Entity\Job findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class JobsTable extends Table
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

        $this->setTable('jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', ['Users' => ['job_count']]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Charts.Users'
        ]);
        $this->belongsTo('Printers', [
            'foreignKey' => 'printer_id',
            'joinType' => 'INNER',
            'className' => 'Charts.Printers'
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
            ->dateTime('date')
            ->allowEmpty('date');

        $validator
            ->integer('pages')
            ->requirePresence('pages', 'create')
            ->notEmpty('pages');

        $validator
            ->integer('copies')
            ->allowEmpty('copies');

        $validator
            ->allowEmpty('host');

        $validator
            ->allowEmpty('file');

        $validator
            ->allowEmpty('params');

        $validator
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['printer_id'], 'Printers'));

        return $rules;
    }
}
