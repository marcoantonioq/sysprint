<?php
namespace Sys\Model\Entity;

use Cake\ORM\Entity;

class Server extends Entity
{
    public static function shell($cmd, $prams)
    {
    	exec("sudo ".ROOT."/plugins/Prints/src/Shell/run getUser", $output, $result);
        if(@$output[0] != "root") {
            echo "Add line: # nano /etc/sudoers</br>";
            echo exec('whoami')." ALL= NOPASSWD:".ROOT."/plugins/Prints/src/Shell/run";
            exit;
        } 
        $output=null; $return=false;
        exec("sudo ".ROOT."/plugins/Prints/src/Shell/run $cmd $prams", $output, $return);
        if($return) { echo "</p>Comando <br>'$cmd'<b> não encontrado!!!<p>$mensage"; exit; }
        return $output;
    }


    public function setConfigDefaults()
    {
        
    }

}
