<?php
/**
  * @var \App\View\AppView $this
  */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $setting->id],
                ['confirm' => __('Apagar Configurações?', $setting->id)]
            )
        ?></li>
    </ul>
</nav>


<hr>

<div class="row-fluid">
    <?= $this->Form->create($setting, [
        'class' => 'form-horizontal'
    ]) ?>
    <h4>Salvar todas as configurações</h4>
    <?= $this->Form->button('Salvar Configurações',['class'=>'btn btn-success']) ?>
    </p>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#APP">APP</a></li>
        <li><a data-toggle="tab" href="#Quota">Quota</a></li>
    </ul>
    <div class="tab-content">
        <div id="APP" class="tab-pane fade in active">            

            <div class="row-fluid">

              <!-- Navigation Buttons -->
              <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked" id="myTabsQuotas">
                    <li class="active"><a data-toggle="tab" href="#Geral">Geral</a></li>
                    <li><a data-toggle="tab" href="#AD">AD</a></li>
                    <li><a data-toggle="tab" href="#Mail">Mail</a></li>
                </ul>
              </div>

              <!-- Content -->
              <div class="col-md-10">
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

            </div>

        </div>
        
        <!-- Quotas -->
        
        <div id="Quota" class="tab-pane fade">            

            <div class="row-fluid">

              <!-- Navigation Buttons -->
              <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked" id="myTabsQuotas">
                  <li class="active"><a href="#QImpressoras" data-toggle="pill">Impressoras</a></li>
                  <li><a href="#QUsers" data-toggle="pill">Usuários</a></li>
                </ul>
              </div>

              <!-- Content -->
              <div class="col-md-10">
                <div class="tab-content">
                    <div class="tab-pane active" id="QImpressoras">
                        <table class='table'>
                            <tbody>
                                <tr>
                                <div>
                                    <b>Período</b> determina o intervalo de tempo para o rastreamento de quota por usuário. O intervalo é expresso em segundos, para que um dia é 86.400, uma semana é 604.800, e um mês é 2,592,000 segundos.<br>
                                    <b>Págias</b> especifica o número de limite de páginas por usuário.<br>
                                    <b>Tamanho</b> opção especifica o limite de tamanho do trabalho de impressão em kilobytes.<br>
                                </div>
                                </tr>
                            <?php foreach ($printers as $key => $printer): ?>
                            <?php echo $this->Form->hidden("Printers.$key.id",['value'=>$printer['id']]); ?>
                            <?php echo $this->Form->hidden("Printers.$key.name",['value'=>$printer['name']]); ?>
                                <tr>
                                    <td>
                                        <?php echo $printer['name']; ?>
                                    </td>
                                    <td><?php echo $this->Form->input("Printers.$key.quota_period", array( 'label'=>'Período','value'=>$printer['quota_period'] )) ?></td>
                                    <td><?php echo $this->Form->input("Printers.$key.page_limite", array( 'label'=>'Págias','value'=>$printer['page_limite'] )) ?></td>
                                    <td><?php echo $this->Form->input("Printers.$key.k_limit", array( 'label'=>'Tamanho','value'=>$printer['k_limit'] )) ?></td>
                                </tr>
                            <?php endforeach; ?>
                              </tbody>
                        </table>
                    </div>
                    
                    <div class="tab-pane" id="QUsers">
                        QUsers
                    </div>

                </div>
              </div>

            </div>

                
        </div>
    
    </div>
    <?= $this->Form->end() ?>
</div>
