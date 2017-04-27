<?php
namespace Prints\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Lpadmin behavior
 */
class LpadminBehavior extends Behavior
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



    private function execRun($cmd, $params){
        // verifica se é root
        exec("sudo ".ROOT."/plugins/Prints/src/Shell/run user", $output, $return);
        if($output[0] != "root") {
            echo "Add line: nano /etc/sudoers</br>";
            echo "{$output[0]} ALL= NOPASSWD:".ROOT."/plugins/Prints/src/Shell/run user";
            exit;
        } 
        // Executa comando
        exec("sudo ".ROOT."/plugins/Prints/src/Shell/run $cmd $params", $output, $return);
        return $output;
    }

    public function execComand($cmd, $params=null){
        exec($cmd,$result, $return);
        if(!$result) {
            echo "</p>Comando '$cmd' falhou!!! </p>:("; exit;
        }
        return $result;
    }
   
    public function getpLpPrinters($type=null) {
        $printers = TableRegistry::get('Printers');
        $cmd = $this->testComand("lpstat").' -a | grep \'^[a-z|A-Z|0-9]\' | awk \'{print $1 "][" $2}\'';
        $values = $this->execComand($cmd);

        foreach ($values as $key => $value) {            
            $tmp = explode("][",$value);
            $pvalue = @$printers->findByName($tmp[0])->first();
            $p = $printers->newEntity();
            if(!empty($pvalue->id)){ 
                $p = $pvalue;
            }
            $p->name = $tmp[0];
            $p->status = $tmp[1];
            $printers->save($p);
            $return[] = $p->toArray();
        }
        return $return;
    }

    public function getpLpList($type=null) {

        $return = array();
        $cmd = $this->testComand("lpstat").' -a | grep \'^[a-z|A-Z|0-9]\' | awk \'{print $1 "][" $2}\'';
        $values = $this->execComand($cmd);
        foreach ($values as $key => $value) {
            $tmp = explode("][",$value);
            $return[$tmp[0]] = $tmp[0];
        }
        return $return;
    }

    public function setPrintSettings($settings)
    {

        $printers = TableRegistry::get('Printers');
        foreach ($settings as $key => $value) {
            $p = $printers->get($value['id']);
            $p->quota_period = $value['quota_period'];
            $p->page_limite = $value['page_limite'];
            $p->k_limit = $value['k_limit'];
            $printers->save($p);
            $return = $this->execRun("lpadmin","  -p '${value['name']}' -o job-quota-period=${value['quota_period']} -o job-page-limit=${value['page_limite']} -o job-k-limit=${value['k_limit']}");

        }

    }

    

}
