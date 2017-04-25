<?php
namespace Prints\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

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

    // testa comandos (return path completo do comando)
    private function testComand($exec){
        $cmd = "command -v $exec";
        exec($cmd,$result, $return);
        if($return) {
            echo "</p>Comando não encontrado!!! </p>Instalar: $exec</p> apt-get install $exec"; exit;
        }
        return $result[0];
    }

    private function execComand($cmd){
        exec($cmd,$result, $return);
        if(!$result) {
            echo "</p>Comando $cmd falhou!!! </p>:("; exit;
        }
        return $result;
    }

    public function getpLpPrinters($type=null) {
        $return = array();
        $cmd = $this->testComand("lpstat").' -a | grep \'^[a-z|A-Z|0-9]\' | awk \'{print $1 "][" $2}\'';
        $values = $this->execComand($cmd);
        foreach ($values as $key => $value) {
            $tmp = explode("][",$value);
            $return[$tmp[0]] = [ 
                "name"=>$tmp[0],
                'status'=>$tmp[1]
            ];
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


}
