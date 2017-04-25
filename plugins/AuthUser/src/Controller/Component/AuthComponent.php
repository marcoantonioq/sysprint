<?php
namespace AuthUser\Controller\Component;

use Cake\Controller\Component;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Routing\Router;
use Cake\Utility\Hash;

class AuthComponent extends Component
{
	public function initialize(array $config)
    {
        parent::initialize($config);
        // $this->_initAuth();

    }

    protected function _initAuth()
    {
    	// pr(Configure::read('Users'));

    	// pr($this->_registry->getController());

        
    }

}