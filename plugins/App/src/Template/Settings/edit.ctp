<?php
/**
  * @var \App\View\AppView $this
  */

?>
<br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Configurações</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><?= $this->Html->link( 'Geral', ['action' => 'index'])?></li>
        <li><?= $this->Html->link( 'Quota', ['action' => 'quota'])?></li>
        <li><?= $this->Html->link( 'Atualizar', ['action' => 'update'])?></li>
    </ul>
</div>
</nav>


<hr>

<div class="row-fluid">
    <?= $this->Form->create($setting, [
        'class' => 'form-horizontal'
    ]) ?>
    
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Geral">Geral</a></li>
        <li><a data-toggle="tab" href="#AD">AD</a></li>
        <li><a data-toggle="tab" href="#Mail">Mail</a></li>
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
                        echo $this->Form->control('ad_conect');
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
