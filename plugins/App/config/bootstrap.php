<?php
define('APP_PATH', ROOT . DS . 'plugins' . DS . 'App');


// use Cake\Cache\Cache;
// use Cake\Console\ConsoleErrorHandler;
// use Cake\Core\App;
use Cake\Core\Configure;
// use Cake\Core\Configure\Engine\PhpConfig;
// use Cake\Core\Plugin;
// use Cake\Database\Type;
// use Cake\Datasource\ConnectionManager;
// use Cake\Error\ErrorHandler;
// use Cake\Log\Log;
// use Cake\Mailer\Email;
// use Cake\Network\Request;
// use Cake\Utility\Inflector;
// use Cake\Utility\Security;
try {
    Configure::load('App.sysprint', 'default');
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}
