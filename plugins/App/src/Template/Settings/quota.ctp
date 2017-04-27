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
        <li><?= $this->Html->link( 'Geral', ['action' => 'index'])?></li>
        <li class="active"><?= $this->Html->link( 'Quota', ['action' => 'quota'])?></li>
        <li><?= $this->Html->link( 'Atualizar', ['action' => 'update'])?></li>
    </ul>
</div>
</nav>


<hr>

<div class="row-fluid">
    <?= $this->Form->create('Printers', [
        'class' => 'form-horizontal'
    ]) ?>
    
    <ul class="nav nav-tabs">
        <li class="active"><a href="#QImpressoras" data-toggle="pill">Impressoras</a></li>
        <li><a href="#QUsers" data-toggle="pill">Usuários</a></li>
    </ul>
    <div class="tab-content">
        <div id="QImpressoras" class="tab-pane fade in active">            
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
        
        <!-- Quotas -->
        
        <div id="QUsers" class="tab-pane fade">
            Regras usuários
                
        </div>
    
    </div>
    <h5>Salvar todas as configurações</h5>
        <?= $this->Form->button('Salvar Configurações',['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
