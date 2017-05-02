<div class="row-fluid">
    <h4>Configurações</h4>
    <ul>
        <li> <?= $this->Html->link('Aplicação', ['plugin'=>'App', 'controller'=>'settings', 'action' => 'edit']) ?></li>
        <li> <?= $this->Html->link('Quotas', ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'quota']) ?></li>
    </ul>
</div>

<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

?>
<div class="content">        
    <div class="row">
        <div class="col-xs12">
            
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
        <div class="col-md-12 alert alert-block alert-danger">
            <ul>
            <?php if (!version_compare(PHP_VERSION, '5.6.0', '>=')): ?>
                <li class="bullet problem">Sua versão do PHP é muito baixa. Você precisa do PHP 5.6.0 ou superior para usar o CakePHP (detectado <?= PHP_VERSION ?>).</li> 
            <?php endif; ?>

            <?php if (!extension_loaded('mbstring')): ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão mbstring carregada.</li>;
            <?php endif; ?>

            <?php if (!extension_loaded('openssl') || !extension_loaded('mcrypt')): ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão openssl ou mcrypt carregada.</li>
            <?php endif; ?>

            <?php if (!extension_loaded('intl')): ?>
                <li class="bullet problem">Sua versão do PHP não tem a extensão intl carregada.</li>
            <?php endif; ?>

            <?php if (!is_writable(TMP)): ?>
                <li class="bullet problem">Seu diretório tmp não é gravável.</li>
            <?php endif; ?>

            <?php if (!is_writable(LOGS)): ?>
                <li class="bullet problem">Seu diretório de registros (sysprint/tmp) não é gravável.</li>
            <?php endif; ?>

            <?php $settings = Cache::config('_cake_core_'); ?>
            <?php if (empty($settings)): ?>
                <li class="bullet problem"> O cache não está funcionando. Verifique as configurações em config /app.php</li>
            <?php endif; ?>
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
            <?php if (!$connected): ?>
                <li class="bullet problem">O servidor de impresão não consegue se conectar ao banco de dados.<br /><?= $errorMsg ?></li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
