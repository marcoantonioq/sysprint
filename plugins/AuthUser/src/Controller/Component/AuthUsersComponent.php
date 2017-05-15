<?php
namespace AuthUser\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Routing\Router;

use AuthUser\Model\Entity\ActiveDirectory;

class AuthUsersComponent extends Component
{
	public function initialize(array $config)
    {
        parent::initialize($config);
        if( $this->enable() ){
            $this->getController()->loadComponent(
                'Auth', Configure::read('SYSPRINT.MODULES.AUTH.Config')
            );
            $this->getController()->Auth->allow(['logout']);
        }
    }

    public function enable()
    {
        if(
            Configure::read('SYSPRINT.MODULES.AUTH.enable') || 
            Configure::read('SYSPRINT.MODULES.AD.enable')
        ){
            return true;
        }
        return false;
    }

    public function enableAD()
    {
        if( Configure::read('SYSPRINT.MODULES.AD.enable') ){
            return true;
        }
        return false;        
    }

    public function logout(){
        if( $this->enable() ){
            return $this->getController()->Auth->logout();
        }
        return "/";
    }

    public function login( ){

        if ( $this->enableAD() ) {
            if( ! ActiveDirectory::getConnect()->auth(
                $this->request->data['username'], 
                $this->request->data['password']
            ) ) { return false; }
        }
        if( $this->enable() ){
            $user = $this->getController()->Auth->identify();
            if ($user) {
                $this->getController()->Auth->setUser($user);
                return true;
            }
        }
        return false;
    }

    public function redirectUrl( )
    {
        return $this->getController()->Auth->redirectUrl();        
    }
    

    protected function _initAuth()
    {
    	// pr(Configure::read('Users'));
    	// pr($this->_registry->getController());        
    }

}