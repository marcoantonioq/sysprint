<?php

namespace AuthUser\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;



class AppController extends BaseController
{
	public function initialize()
    {

        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

    }


    // public function isAuthorized($user) {
    //     return true;
    //     pr($user); exit;
    //     pr($this->request->getParam('action')); exit;
    //     // Todos os usuários registrados podem adicionar artigos
    //     if ($this->request->getParam('action') === 'add') {
    //         return true;
    //     }
    //     // Apenas o proprietário do artigo pode editar e excluí
    //     if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
    //         $articleId = (int)$this->request->getParam('pass.0');
    //         if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
    //             return true;
    //         }
    //     }

    //     return parent::isAuthorized($user);
    // }


    public function beforeFilter(Event $event){
        // $this->Auth->allow();
        // $this->Auth->allow(['index', 'view', 'display']);
    }

}
