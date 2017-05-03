<?php
namespace AuthUser\Controller;

use AuthUser\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \AuthUser\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($this->AuthUsers->login()) {
                return $this->redirect($this->AuthUsers->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'), ['plugin' => 'Template']);
        }
    }

    public function logout(){
        return $this->redirect($this->AuthUsers->logout());
    }

    public function index(){
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        if (empty($id) ) {
            if (!isset($this->Auth) || !$this->Auth->user('id')) {
                return $this->redirect(['action' => 'index']);
            }
            $id = $this->Auth->user('id');
        }
        $user = $this->Users->get($id);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Usuário salvo com sucesso', ['plugin' => 'Template']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('O usuário não pôde ser salvo. Por favor, tente novamente.', ['plugin' => 'Template']);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'), ['plugin' => 'Template']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('O usuário não pôde ser salvo. Por favor, tente novamente.', ['plugin' => 'Template']);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render("Users/add");
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'), ['plugin' => 'Template']);
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'), ['plugin' => 'Template']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
