<?php
namespace Sys\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Settings Controller
 *
 * @property \Sys\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController
{

    public function index()
    {
        
    }

    public function edit()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->Settings->saveConfig(
                Configure::read(), 
                $this->request->getData()
            );
            $this->Flash->success("Novas configurações definidas!", 
                ['plugin' => 'Template']
            );
            return $this->redirect(['action' => 'index']);
        }
        $this->request->data = Configure::read();
    }


    public function update(){
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->Settings->gitUpdate()){
                $this->Flash->success("Atualizado com sucesso!", ['plugin' => 'Template']);
            } else {
                $this->Flash->error("Não foi possivel atualizar!", ['plugin' => 'Template']);
            }
        }
        $version = $this->Settings->checkUpdate();
        if($version){
            $this->Flash->error("Atualize para a última versão($version).", ['plugin' => 'Template']);
        }
        $this->set(compact('version'));
    }

    public function modules(){
        if ($this->request->is(['patch', 'post', 'put'])) {
            
        }
        $modules = Configure::read("SYSPRINT.MODULES");
        $this->set(compact('modules'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            $this->Flash->success(__('Deletado com sucesso.'), ['plugin' => 'Template']);
        } else {
            $this->Flash->error(__('Não foi apagar guardar a definição.'), ['plugin' => 'Template']);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function debug()
    {
        
    }
}
