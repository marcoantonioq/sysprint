<?php return array (
  'SYSPRINT' => 
  array (
    'GLOBAL' => 
    array (
      'status' => '0',
      'title' => 'SYSPrints',
      'locale' => 'pt-br',
      'date_time_format' => 'd, M Y H:i:s',
      'force_https' => '0',
      'descrition' => '',
    ),
    'MODULES' => 
    array (
      'AUTH' => 
      array (
        'enable' => '1',
        'Config' => 
        array (
          'authorize' => array('Controller'),
          'loginRedirect' => '/',
          'logoutRedirect' => '/',
          'authError' => 'Você não está autorizado a acessar esse local!',
          'loginAction' => 
          array (
            'plugin' => 'AuthUser',
            'controller' => 'Users',
            'action' => 'login',
          ),
          'flash' => 
          array (
            'element' => 'Template.error',
          ),
          'authenticate' => 
          array (
            'Form' => 
            array (
              'fields' => 
              array (
                'username' => 'username',
                'password' => 'password',
              ),
            ),
          ),
        ),
      ),
      'AD' => 
      array (
        'enable' => '0',
        'Config' => 
        array (
          'ldap_host' => '10.11.0.10',
          'ldap_port' => '389',
          'base_dn' => 'OU=IFG,DC=ifg,DC=br',
          'ldap_user' => 'goiservice',
          'ldap_pass' => 'Brasil05',
          'suffix' => '@ifg.br',
          'attr' => 'name,displayname,mail,mobile,homephone,telephonenumber,streetaddress,postalcode,physicaldeliveryofficename,l,group,thumbnailphoto,memberof,department',
          'filter' => '&(objectClass=user)(!(extensionattribute2=*Aluno*))',
        ),
      ),
    ),
  ),
  'debug' => '1',
);