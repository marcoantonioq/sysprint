<?php
/**
  * @var \App\View\AppView $this
  */
// pr($this->request->data); exit;
?>
    <?= $this->Form->create("Settings", [
        'class' => 'form-horizontal'
    ]) ?>
    

<div class="row-fluid">
        <?php
        echo $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar',
            ['plugin'=>'app', 'controller' => 'settings', 'action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
            ?>
            <?= $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar',['class'=>'btn btn-success']) ?>
</div>

<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Geral">Geral</a></li>
        <li><a data-toggle="tab" href="#AUTH">Autenticação</a></li>
        <li><a data-toggle="tab" href="#AD">AD</a></li>        
    </ul>
    <div class="tab-content">
        <div class="tab-content">                    
            <div id="Geral" class="tab-pane fade in active">
                <legend>Geral</legend>
                <?php
                    echo $this->Form->control('SYSPRINT.GLOBAL.status',['label'=>'Manutenção','type'=>'checkbox']);
                    echo $this->Form->control('debug',['label'=>'Depuração', 'type'=>'checkbox']);
                    echo $this->Form->control('SYSPRINT.GLOBAL.title');
                    echo $this->Form->control('SYSPRINT.GLOBAL.locale');
                    echo $this->Form->control('SYSPRINT.GLOBAL.date_time_format');
                    echo $this->Form->control('SYSPRINT.GLOBAL.locale');
                    echo $this->Form->control('SYSPRINT.GLOBAL.force_https');
                    echo $this->Form->control('SYSPRINT.GLOBAL.descrition');
                 ?>
            </div>
            <div id="AUTH" class="tab-pane fade">
                <legend>Autenticação</legend>
                    <?php 
                        echo $this->Form->control('SYSPRINT.MODULES.AUTH.enable',['label'=>'Habilitar','type'=>'checkbox']);
                        echo $this->Form->control('SYSPRINT.MODULES.AUTH.Config.authenticate.Form.fields.username',[
                            'label'=>'Campo usuários:'
                        ]);
                        echo $this->Form->control('SYSPRINT.MODULES.AUTH.Config.authenticate.Form.fields.password',[
                            'label'=>'Campo password:',
                            'type'=>'text'
                        ]);

                     ?>
            </div>
            <div id="AD" class="tab-pane fade">
                <legend>AD</legend>
                    <?php 
                        echo $this->Form->control('SYSPRINT.MODULES.AD.enable',['label'=>'Habilitar','type'=>'checkbox']);
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.ldap_host');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.ldap_port');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.base_dn');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.ldap_user');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.ldap_pass');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.suffix');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.attr');
                        echo $this->Form->control('SYSPRINT.MODULES.AD.Config.filter');
                        
                     ?>
            </div>
        </div>    
    </div>
        
    <?= $this->Form->end() ?>
</div>
