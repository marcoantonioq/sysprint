<?php
namespace Prints\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


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
        $this->addBehavior('Prints.Runshell');

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


    public function sendPrint($data){
        $_imagetypes = array(
            'application/odt',
            'application/pdf',
            'application/txt',
            // 'application/doc',
            // 'application/msword',
            // 'application/wps-office.doc',
            // 'application/wps-office.docx',
            // 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            // 'application/wps-office.xls',
            // 'application/wps-office.xlt',
            // 'image/bmp',
            // 'image/vnd.microsoft.icon',
            // 'image/x-icon',
            // 'text/plain',
            'image/gif',
            'image/jpeg',
            'image/pjpeg',
            'image/png',
        );

        $user = $this->Users->get($data['user_id'])->get('username');
        $printer = $data['printer_id'];
        // pr($data); exit;

        foreach ($data['file'] as $file) {
            $path = $file['tmp_name'];

            if ( array_search($file['type'], $_imagetypes) === false ){
                echo "O tipo de arquivo \"{$file['name']}\" enviado é inválido! (Arquivos válidos: PDF, txt, png, jpge)"; exit;
            }

            $data['params'] = array_filter($data['params'], function($value) { return $value !== ''; });
            $params = " -o fit-to-page";
            $keyparams = [
                'copies' => ' -n ',
                'pages' => ' -o page-ranges=',
                'double_sided' => ' -o sides=',
                'page_set' => ' -o page-set=',
                'media' => ' -o media=',
                'orientation' => ' -o orientation-requested=',
            ];
            foreach ($data['params'] as $key => $value){
                $params .= "{$keyparams[$key]}{$value} ";
            }
            $cmd = $this->testComand("lp")." -U {$user} -d {$printer} $params $path"; // pr($comand); exit;
            $this->sendSpool($cmd);
            exec("rm -rf $path {$file['tmp_name']}");
        }
        return true;
    }

}
