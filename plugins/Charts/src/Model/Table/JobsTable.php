<?php
namespace Charts\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
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



    public function getCharts($type)
    {
        $query = $this->find();
        $datasets['datasets'][] = [
            "backgroundColor" => [
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(153, 102, 255, 0.4)',
                'rgba(255, 159, 64, 0.4)',
            ],
            "data" =>  null
        ];
        switch ($type) {
            case 'impressoras':
                $charts_data = $query->find("all",[])
                        ->select([
                            'labels'=>'Printers.name',
                            'sum'=>$query->func()->sum('Jobs.copies * Jobs.pages'),
                        ])
                        ->contain(['Printers'])
                        // ->order(['sum'=>'desc'])
                        ->group('Printers.id');
                        // ->where(['Jobs.date >' => new \DateTime('-360 days')]);
                break;            
            case 'usuários':
                $charts_data = $query->find("all",[])
                    ->select([
                        'sum'=>$query->func()->sum('Jobs.copies * Jobs.pages'),
                        'labels'=>'Users.name',
                    ])
                    ->contain(['Users'])
                    ->order(['sum'=>'desc'])
                    ->group('Jobs.user_id');
                    // ->where(['Jobs.date >' => new \DateTime('-360 days')]);
                break;
            case 'anual':
                $charts_data = $query->find("all",[])
                    ->select([
                        'sum'=>$query->func()->sum('Jobs.copies * Jobs.pages'),
                        'labels'=>"DATE_FORMAT(Jobs.date,'%m/%Y')",
                    ])
                    ->order(['labels'=>'desc'])
                    ->group('MONTH(Jobs.date)');
                    // ->where(['Jobs.date >' => new \DateTime('-360 days')]);
                break;
            default:
                return null;
                break;
        }
        $datasets['datasets'][0]['label'] = ucfirst($type);
        foreach ($charts_data as $charts) {
            $datasets['labels'][] = $charts->labels;
            $datasets['datasets'][0]['data'][] = $charts->sum;
            $datasets['datasets'][0]['backgroundColor'][] = 'rgba(' . rand(128,255) . ',' . rand(128,255) . ',' . rand(128,255) . ', 0.4)';
        }
        $object = (object)$datasets;
        return $object;
    }
}
