<?php

// for built-in server
if (php_sapi_name() === 'cli-server') {
    $_SERVER['PHP_SELF'] = '/' . basename(__FILE__);

    $url = parse_url(urldecode($_SERVER['REQUEST_URI']));
    $file = __DIR__ . $url['path'];
    if (strpos($url['path'], '..') === false && strpos($url['path'], '.') !== false && is_file($file)) {
        return false;
    }
}
if (version_compare(PHP_VERSION, '5.6.0') < 0) {
	echo 'A versão do PHP deve ser igual ou superior à 5.6.0 para usar o SYSPrint.'; exit;
}

if (!extension_loaded('mbstring')) {
    echo 'Você deve ativar a extensão mbstring para usar o SYSPrint.'; exit;
}


if (!extension_loaded('intl')) {
    echo 'Você deve ativar a extensão intl para usar o SYSPrint'; exit;
}


require dirname(__DIR__) . '/vendor/autoload.php';

use App\Application;
use Cake\Http\Server;

// Bind your application to the server.
$server = new Server(new Application(dirname(__DIR__) . '/config'));

// Run the request/response through the application
// and emit the response.
$server->emit($server->run());
