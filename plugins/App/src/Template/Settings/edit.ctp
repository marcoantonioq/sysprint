<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="row-fluid">
    <?= $this->Form->create($setting, [
        'class' => 'form-horizontal'
    ]) ?>
    
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Geral">Geral</a></li>
        <li><a data-toggle="tab" href="#AD">AD</a></li>
        <li><a data-toggle="tab" href="#Mail">Mail</a></li>
        <li><a data-toggle="tab" href="#Update">Update</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-content">
                    
            <div id="Geral" class="tab-pane fade in active">
                <legend>Geral</legend>
                <?php
                    echo $this->Form->control('app_status');
                    echo $this->Form->control('app_debug');
                    echo $this->Form->control('app_title');
                    echo $this->Form->control('app_locale');
                    echo $this->Form->control('app_dateformtar');
                    echo $this->Form->control('app_https');
                    echo $this->Form->control('app_auth');
                 ?>
            </div>
            <div id="AD" class="tab-pane fade">
                <legend>AD</legend>
                    <?php 
                        echo $this->Form->control('ad_conect',[
                            'data-toggle'=>'button'
                        ]);
                        echo $this->Form->control('ad_host');
                        echo $this->Form->control('ad_port');
                        echo $this->Form->control('ad_dn');
                        echo $this->Form->control('ad_user');
                        echo $this->Form->control('ad_pass');
                        echo $this->Form->control('ad_suffix');
                        echo $this->Form->control('ad_attr');
                        echo $this->Form->control('ad_filter');
                     ?>
            </div>
            <div id="Mail" class="tab-pane fade">
                <legend>E-Mail</legend>
                    <?php 
                        echo $this->Form->control('mail_conect');
                        echo $this->Form->control('mail_transport');
                        echo $this->Form->control('mail_title');
                        echo $this->Form->control('mail_from');
                        echo $this->Form->control('mail_host');
                        echo $this->Form->control('mail_port');
                        echo $this->Form->control('mail_timeout');
                        echo $this->Form->control('mail_username');
                        echo $this->Form->control('mail_password');
                        echo $this->Form->control('mail_charset');
                    ?>
            </div>
            <div id="Update" class="tab-pane fade">
            <div class="row-fluid">
                <div class="span12">
                    <h3>
                        Versão atual: <?php echo $version[0]; ?>
                    </h3>
                </div>

                <div class="span12">
                <?php
                  echo $this->Form->postLink('Atualizar',
                    array('action' => 'update'),
                    array('class'=> 'btn btn-success'),
                            __('Tem certeza de que deseja atualizar o sistema? (Faça backup)')
                  )." ";

                  echo $this->Form->postLink('DB Defaul',
                    array('action' => 'restoreDB'),
                    array('class'=> 'btn btn-danger'),
                            __('Alerta!!! Tem certeza de que deseja restaurar banco de dados padrão de fabrica? (Faça backup)')
                  )." ";
                ?>
                </div>

                <div class="span12">
                    <?php
                    if (!empty($return))
                    foreach ($return as $line => $value): ?>
                        <?php echo $value; ?><br>
                    <?php endforeach ?>
                </div>
            </div>

            </div>
        </div>    
    </div>
    <h5>Salvar todas as configurações</h5>
        <?= $this->Form->button('Salvar Configurações',['class'=>'btn btn-success']) ?>
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $setting->id],
            [
                'confirm' => __('Apagar Configurações?', $setting->id),
                'class'=>'btn btn-danger',
            ]
        )?>
        
    <?= $this->Form->end() ?>
</div>
