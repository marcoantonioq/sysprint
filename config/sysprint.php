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
        'enable' => '0',
        'Config' => 
        array (
          'loginRedirect' => '/',
          'logoutRedirect' => '/',
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
              'scope' => 
              array (
                'Users.status' => 1,
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
          'ldap_host' => '192.168.1.1',
          'ldap_port' => '389',
          'base_dn' => 'OU=SYSPrint,DC=sys,DC=br',
          'ldap_user' => 'user_ad',
          'ldap_pass' => 'password_ad',
          'suffix' => '@sysprint.br',
          'attr' => 'name,displayname,mail,mobile,homephone,telephonenumber,streetaddress,postalcode,physicaldeliveryofficename,l,group,thumbnailphoto,memberof',
          'filter' => '',
        ),
      ),
    ),
  ),
  'debug' => '1',
);