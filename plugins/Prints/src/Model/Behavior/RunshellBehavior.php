<?php
namespace Prints\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Lpadmin behavior
 */
class RunshellBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    protected $_table;
    public function __construct(Table $table, array $config){
        parent::__construct($table, $config);
        $this->_table = $table;
    }

    private function authServer()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Usuáro ou senha no servidor inválida';
            exit;
        }
        return [
            'user'=>$_SERVER['PHP_AUTH_USER'],
            'password'=>$_SERVER['PHP_AUTH_PW']
        ];        
    }

    // testa comandos (return path completo do comando)
    public function testComand($exec){
        $cmd = "command -v $exec";
        exec($cmd,$result, $return);
        if($return) {
            echo "</p>Comando não encontrado!!! </p>Instalar: $exec</p> apt-get install $exec"; exit;
        }
        return $result[0];
    }

    private function execRun($cmd, $params=null){
        // verifica se é root
        exec("sudo ".ROOT."/plugins/Prints/src/Shell/run user", $output);
        if(@$output[0] != "root") {
            echo "Add line: nano /etc/sudoers</br>";
            echo "(USER_SERVER:{$output[0]}) ALL= NOPASSWD:".ROOT."/plugins/Prints/src/Shell/run user";
            exit;
        } 
        // Executa comando
        $output=null; $return=false;
        exec("sudo ".ROOT."/plugins/Prints/src/Shell/run $cmd $params", $output, $return);
        if($return) { echo "</p>Comando <br>'$cmd'<b> não encontrado!!!"; exit; }
        return $output;
    }
   
    public function getLpPrinters($type=null) {
        $printers = TableRegistry::get('Printers');
        $values = $this->execRun('getLpPrinters');

        foreach ($values as $key => $value) {
            $pvalue = @$printers->findByName($value)->first();
            $p = $printers->newEntity();
            if(!empty($pvalue->id)){ 
                $p = $pvalue;
            }
            $p->name = $value;
            $printers->save($p);
            $return[] = $p->toArray();
        }
        return $return;
    }

    public function getLpListPrinters($printer = null ) {
        $printers = $this->getLpPrinters();
        foreach ($printers as $value) {
            $list[$value['name']] = $value['name'];
        }
        // if(!empty($printer) && !empty($list[$printer])){
        //     $list = [$list[$printer]=>$list[$printer]];
        // }
        return $list;
    }

    public function setPrintSettings($settings)
    {
        if(isset($settings['id'])){
            $settings = [$settings];
        }
        foreach ($settings as $key => $value) {
            $return = $this->execRun("lpadmin","  -p '${value['name']}' -o job-quota-period=${value['quota_period']} -o job-page-limit=${value['page_limite']} -o job-k-limit=${value['k_limit']}");

        }
    }

    public function sendSpool($cmd=''){
        exec($cmd, $output, $return);
        if($return) { echo "</p>Comando <b>'$cmd'<b> não encontrado!!!<p>"; pr($output); exit; }
    }
}