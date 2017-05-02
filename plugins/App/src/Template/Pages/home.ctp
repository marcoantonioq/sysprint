<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'Sistema de impresão';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

<?= $this->Html->meta('icon') ?>
<?= $this->Html->css([
  'Template.bootstrap.min.css',
  'Template.bootstrap-theme.min.css',
  'Template.print.css',
  'Template.multi-select.css',
  'Template.simple-sidebar.css',
  'Template.icons.css',
]); ?>
<?= $this->Html->script([
  'Template.jquery.min.js',
  'Template.bootstrap.min.js',
  'Template.multi-select.js',
  'Template.chart.js',
]);?>


<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
</head>
<body class="home">

<div class="content">
        
    <header class="row">
        <div class="header-title">
            <h1>Servidor de Impressão</h1>
        </div>
    </header>

    <div class="row">
        <div class="columns large-12">
            
            <div id="url-rewriting-warning" class="alert url-rewriting">
                <ul>
                    <li class="bullet problem">
                        A reescrita de URL não está configurada corretamente no servidor.<br />
                        1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation.html#url-rewriting">Ajude-me a configurá-lo</a><br />
                        2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration">Eu não / não consigo usar a reescrita de URL</a>
                    </li>
                </ul>
            </div>
            <?php Debugger::checkSecurityKeys(); ?>
        </div>
    </div>

    <div class="row">
        <div class="columns large-6">
            <h4>Environment</h4>
            <ul>
            <?php if (version_compare(PHP_VERSION, '5.6.0', '>=')): ?>
                <li class="bullet success">Sua versão do PHP é 5.6.0 ou superior (detectada <?= PHP_VERSION ?>).</li>
            <?php else: ?>
                <li class="bullet problem">Sua versão do PHP é muito baixa. Você precisa do PHP 5.6.0 ou superior para usar o CakePHP (detectado <?= PHP_VERSION ?>).</li>
            <?php endif; ?>

            <?php if (extension_loaded('mbstring')): ?>
                <li class="bullet success">Sua versão do PHP tem a extensão mbstring carregada.</li>
            <?php else: ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão mbstring carregada.</li>;
            <?php endif; ?>

            <?php if (extension_loaded('openssl')): ?>
                <li class="bullet success">Sua versão do PHP tem a extensão openssl carregada.</li>
            <?php elseif (extension_loaded('mcrypt')): ?>
                <li class="bullet success">Sua versão do PHP tem a extensão mcrypt carregada.</li>
            <?php else: ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão openssl ou mcrypt carregada.</li>
            <?php endif; ?>

            <?php if (extension_loaded('intl')): ?>
                <li class="bullet success">Sua versão do PHP tem a extensão intl carregada.</li>
            <?php else: ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão intl carregada.</li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="columns large-6">
            <h4>Filesystem</h4>
            <ul>
            <?php if (is_writable(TMP)): ?>
                <li class="bullet success">Seu diretório tmp é gravável.</li>
            <?php else: ?>
                <li class="bullet problem">Seu diretório tmp não é gravável.</li>
            <?php endif; ?>

            <?php if (is_writable(LOGS)): ?>
                <li class="bullet success">Seu diretório de logs é gravável.</li>
            <?php else: ?>
                <li class="bullet problem">Seu diretório de registros não é gravável.</li>
            <?php endif; ?>

            <?php $settings = Cache::config('_cake_core_'); ?>
            <?php if (!empty($settings)): ?>
                <li class="bullet success">O <em><?= $settings['className'] ?>Engine </ em> está sendo usado para o cache do núcleo. Para alterar a configuração de configuração de edição / app.php</li>
            <?php else: ?>
                <li class="bullet problem"> O cache não está funcionando. Verifique as configurações em config /app.php</li>
            <?php endif; ?>
            </ul>
        </div>
        <hr />
    </div>

    <div class="row">
        <div class="columns large-6">
            <h4>Database</h4>
            <?php
            try {
                $connection = ConnectionManager::get('default');
                $connected = $connection->connect();
            } catch (Exception $connectionError) {
                $connected = false;
                $errorMsg = $connectionError->getMessage();
                if (method_exists($connectionError, 'getAttributes')):
                    $attributes = $connectionError->getAttributes();
                    if (isset($errorMsg['message'])):
                        $errorMsg .= '<br />' . $attributes['message'];
                    endif;
                endif;
            }
            ?>
            <ul>
            <?php if ($connected): ?>
                <li class="bullet success">CakePHP é capaz de se conectar ao banco de dados.</li>
            <?php else: ?>
                <li class="bullet problem">O CakePHP não consegue se conectar ao banco de dados.<br /><?= $errorMsg ?></li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="columns large-6">
            <h4>DebugKit</h4>
            <ul>
            <?php if (Plugin::loaded('DebugKit')): ?>
                <li class="bullet success">DebugKit está carregado.</li>
            <?php else: ?>
                <li class="bullet problem">O DebugKit não está carregado. Você precisa instalar pdo_sqlite ou definir o nome da conexão "debug_kit"</li>
            <?php endif; ?>
            </ul>
        </div>
        <hr />
    </div>

   

</div>
</body>
</html>
