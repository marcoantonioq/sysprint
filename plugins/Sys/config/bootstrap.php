<?php

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
    Configure::load('sysprint', 'default');
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

date_default_timezone_set('America/Sao_Paulo');
ini_set('upload_max_filesize', '1024M');
ini_set('post_max_size', '1024M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

