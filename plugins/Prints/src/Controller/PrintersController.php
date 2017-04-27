<?php
namespace Prints\Controller;

use Prints\Controller\AppController;
use Prints\Form\SpoolForm;
/**
 * Printers Controller
 *
 * @property \Prints\Model\Table\PrintersTable $Printers
 */
class PrintersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // pr($this->Auth->user('id'));
        $printers = $this->Printers->getpLpPrinters();
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

    /**
     * spool method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function spool()
    {
        $spool = new SpoolForm();
        if ($this->request->is('post')) {
            $this->Printers->sendPrint($this->request->data);
            pr($this->request->data); exit;
            $thiss->Flash->success(__('Impressão enviada'));
            // $this->Printers->sendEmail($user['User']['email'], $message);

            return $this->redirect(['action' => 'index']);
        }
        $users = $this->Printers->Users->find('list');
        $printers = $this->Printers->getpLpList();
        $this->set(compact('spool','printers', 'users'));
    }
}