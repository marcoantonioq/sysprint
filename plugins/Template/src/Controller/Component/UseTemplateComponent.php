<?php
namespace Template\Controller\Component;

use Cake\Controller\Component;

class UseTemplateComponent extends Component
{
	public function initialize(array $config)
    {
        parent::initialize($config);
        $this->getController()->viewBuilder()->setLayout('Template.admin');

        if( !empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'app') {
            $this->layout = 'user';
        } else {
            $this->layout = 'admin';
        }

        if($this->request->is('ajax')){
            $this->layout='ajax';
        }
    }


}