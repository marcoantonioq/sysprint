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

        $charts_anual = $this->Jobs->find("list",[
                'keyField' => 'user_id',
                'valueField' => function ($e) {
                    $return['sum'] = $e->pages * $e->copies;
                    $return['month'] = date_format($e->date,"m");
                    return $return;
                },
                'groupField' => 'user_id'
                // 'valueField' => 'sum(Jobs.pages)*sum(Jobs.copies)',
                // 'group' => 'MONTH(date)',
                // 'order' => ['MONTH(date)' => 'ASC'],
            ]);
            // ->select([
            //     'pages'=>'sum(Jobs.pages)',
            //     'copies'=>'sum(Jobs.copies)',
            //     'sum'=>'sum(Jobs.pages)*sum(Jobs.copies)',
            //     'date',
            // ]);
            // ->where(['Jobs.date >' => new \DateTime('-30 days')]);

        $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        // foreach ($charts_anual as $charts) {
        //     $grafical['month'] .= // $month[] .= ;
        //     $grafical['total'] .= $charts->sum;
        // }
        pr($charts_anual->toArray()); exit;

        // exit;

        $this->set(compact('jobs','charts_anual'));
        $this->set('_serialize', ['jobs']);
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
