<?php
namespace Sys\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \Sys\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \Sys\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \Sys\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \Sys\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Sys\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Sys\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \Sys\Model\Entity\Setting findOrCreate($search, callable $callback = null, $options = [])
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
        $this->addBehavior('Sys.Update',[
            '_updateFile'=>ROOT,
            '_updateUrl'=>'https://github.com/marcoantonioq/sysprint.git', 
        ]);

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
        return $validator;
    }

    public function saveConfig($configs, $configReplace) 
    {
        $config_all = array_replace_recursive(
            $configs, 
            $configReplace
        );
        $config['SYSPRINT'] = $config_all['SYSPRINT'];
        $config['debug'] = $config_all['debug'];
        file_put_contents(
            ROOT."/config/sysprint.php", 
            "<?php return ".var_export($config, TRUE).";"
        );
        return true;

    }
}
