<?php
namespace Prints\Controller;

use Cake\Event\Event;   

use Prints\Controller\AppController;
use Prints\Form\SpoolForm;
/**
 * Printers Controller
 *
 * @property \Prints\Model\Table\PrintersTable $Printers
 */
class PrintersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        // parent::beforeFilter();
        $this->Auth->allow("index");
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // pr($this->Auth->user('id'));
        $printers = $this->Printers->getPrinters();
        $this->set(compact('printers'));
        $this->set('_serialize', ['printers']);
    }

    /**
     * View method
     *
     * @param string|null $id Printer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $printer = $this->Printers->get($id, [
            'contain' => ['Users', 'Jobs']
        ]);

        $this->set('printer', $printer);
        $this->set('_serialize', ['printer']);
    }

    public function quota()
    {    
        $printsLp = $this->Printers->getPrinters();
        foreach ($printsLp as $value) {
            $printer[] = $this->Printers->get($value['id'], [
                'contain' => ['Users']
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($this->request->getData() as $key => $value) {
                $this->Printers->setQuota($value);
                $save = $this->Printers->patchEntity($printer[$key], $value);
                $this->Printers->save($save);
            }
            $this->Flash->success('Quota salvo com sucesso', ['plugin' => 'Template']);
            return $this->redirect(['plugin'=>'sys', 'controller'=>'settings', 'action' => 'index']);
        }
        $users = $this->Printers->Users->find('list', ['limit' => 200]);
        $this->set(compact('printer', 'users'));
    }


    /**
     * spool method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function spool($print_default=null) {
        $spool = new SpoolForm();
        if ($this->request->is('post')) {
            $this->Printers->sendPrint($this->request->data);
            $this->Flash->success('Impressão enviada.', ['plugin' => 'Template']);
            // $this->Printers->sendEmail($user['User']['email'], $message);
            return $this->redirect(['action' => 'index']);
        }
        $users = $this->Printers->Users->find('list');
        $printers = $this->Printers->listPrinters( );
        $this->set(compact('spool','printers', 'users','print_default'));
    }
}