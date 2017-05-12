<?php
namespace Charts\Controller;

use Charts\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \Charts\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Printers']
        ];
        $jobs = $this->paginate($this->Jobs);
        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);
    }

    public function backGroundUpdates()
    {
        $this->render = false;
        $this->Jobs->reloadLogs();
        return $this->redirect(['action' => 'index']);
    }

    public function type($type){
        $charts = $this->Jobs->getCharts($type);
        $this->set(compact('charts'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Users', 'Printers']
        ]);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'), ['plugin' => 'Template']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'), ['plugin' => 'Template']);
        }
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        $printers = $this->Jobs->Printers->find('list', ['limit' => 200]);
        $this->set(compact('job', 'users', 'printers'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'), ['plugin' => 'Template']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'), ['plugin' => 'Template']);
        }
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        $printers = $this->Jobs->Printers->find('list', ['limit' => 200]);
        $this->set(compact('job', 'users', 'printers'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'), ['plugin' => 'Template']);
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'), ['plugin' => 'Template']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
