<?php
namespace Prints\Controller;

use Prints\Controller\AppController;

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
        if ($this->request->is('post')) {
            $printer = $this->Printers->patchEntity($printer, $this->request->getData());
            if ($this->Printers->save($printer)) {
                $this->Flash->success(__('The printer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The printer could not be saved. Please, try again.'));
        }
        $users = $this->Printers->Users->find('list', ['limit' => 200]);
        pr($users); exit;
        $printer = $printers = $this->Printers->getpLpList();
        $this->set(compact('printer', 'users'));
    }
}