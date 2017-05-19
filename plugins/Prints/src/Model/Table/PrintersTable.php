<?php
namespace Prints\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Sys\Model\Entity\Cups;
use Sys\Model\Entity\Spool;


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
            ->allowEmpty('id');

        $validator
            ->requirePresence('name')
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

    public function getPrinters(){
        $Cups = new Cups();
        $return = [];
        foreach ($Cups->getPrinters() as $name) {
            $data = $this->newEntity();
            $data->id = $this->findByName($name)->first()['id'];
            $data->name = $name;
            $data->status = '';
            $this->save($data);
            $return[] = $data->toArray();
        }
        // pr($return); exit;
        return $return;
    }

    public function listPrinters() {
        foreach ($this->getPrinters() as $printer) {
            // pr($printer['name']); exit;
            $return[$printer['name']] = $printer['name'];
        }
        return $return;        
    }

    public function setQuota($settings)
    {
        Cups::setQuota($settings); 
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

    public function print($data){
        $Spool = new Spool();
        return $Spool->send($data);
    }
}
