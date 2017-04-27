<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController
{

    public function index()
    {

        if ( !$this->Settings->exists(0) ) {
            $setting = $this->Settings->newEntity();
        } else {
            $setting = $this->Settings->get(0, ['contain' => []]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $setting = $this->Settings->patchEntity($setting, $this->request->getData());

            if ($this->Settings->save($setting)) {
                $this->Flash->success("Salvo com sucesso", ['plugin' => 'Template']);
            } else {
                $this->Flash->error('Não foi possível guardar a definição.', ['plugin' => 'Template']);                
            }
        }        
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
        $this->render("Settings/edit");
    }

    public function quota()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Settings->setPrintSettings($this->request->getData('Printers'));
        }        
        $printers = $this->Settings->getpLpPrinters();
        $this->set(compact('printers'));
    }

    public function update(){
        if ($this->request->is(['patch', 'post', 'put'])) {
            $version = $this->Settings->execComand("cd ".ROOT."; git fetch; git pull --tag; git reset --hard HEAD; git reset --hard origin/master; chmod 777 -R ./");
        }

        $version = $this->Settings->execComand("cd ".ROOT."; git tag | tail -n 1");
        $this->set(compact('version'));
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
}