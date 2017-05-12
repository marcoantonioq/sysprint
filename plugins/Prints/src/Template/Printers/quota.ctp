<?php
/**
  * @var \App\View\AppView $this
  */

?>



<div class="row-fluid">
        <?php
        echo $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar',
            ['plugin'=>'sys', 'controller' => 'settings', 'action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
            ?>

    <?php 
    if (!empty($printer))
        echo $this->Form->create($printer, [
            'class' => 'form-horizontal'
        ]); 
    ?>

            <?= $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar',['class'=>'btn btn-success']) ?>
</div>

<div class="row-fluid">
    
    <ul class="nav nav-tabs">
        <li class="active"><a href="#QImpressoras" data-toggle="pill">Quotas</a></li>
        <li><a href="#QUsers" data-toggle="pill">Acesso</a></li>
    </ul>
    <div class="tab-content">
        <div id="QImpressoras" class="tab-pane fade in active">
            <div class="table-responsive">
            <table class='table'>
                <tbody>
                    <tr>
                        <div>
                            <b>Período</b> determina o intervalo de tempo para o rastreamento de quota por usuário. O intervalo é expresso em segundos, para que um dia é 86.400, uma semana é 604.800, e um mês é 2,592,000 segundos.<br>
                            <b>Págias</b> especifica o número de limite de páginas por usuário.<br>
                            <b>Tamanho</b> opção especifica o limite de tamanho do trabalho de impressão em kilobytes.<br>
                        </div>
                    </tr>
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Publica</b></td>
                        <td><b>Período</b></td>
                        <td><b>Págias</b></td>
                        <td><b>Tamanho</b></td>
                    </tr>
                    <?php
                        if (!empty($printer))
                        foreach ($printer as $key => $lp): 
                            // pr($lp['name']);
                        echo $this->Form->hidden("$key.id",['value'=>$lp['id']]);
                        echo $this->Form->hidden("$key.name",['value'=>$lp['name']]); 
                    ?>
                    <tr>
                        <td>
                            <?php echo $lp['name']; ?>
                        </td>
                        <td><?php echo $this->Form->checkbox("$key.allow", array( 'label'=>'Publica','value'=>$lp['allow'] )) ?></td>
                        <td><?php echo $this->Form->input("$key.quota_period", array( 'label'=>'Período','value'=>$lp['quota_period'] )) ?></td>
                        <td><?php echo $this->Form->input("$key.page_limite", array( 'label'=>'Págias','value'=>$lp['page_limite'] )) ?></td>
                        <td><?php echo $this->Form->input("$key.k_limit", array( 'label'=>'Tamanho','value'=>$lp['k_limit'] )) ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
            </div>
        </div>
        
        <!-- Quotas -->
        
        <div id="QUsers" class="tab-pane fade">
            
            <div class="printers form large-9 medium-8 columns content">
                <fieldset>
                    <?php 
                        if (!empty($printer))
                        foreach ($printer as $key => $lp): 
                    ?>
                        <hr>
                        <h5 class="text-center text-uppercase"><?=$lp['name'] ?></h5>
                    <?php
                            echo $this->Form->hidden("$key.id",['value'=>$lp['id']]);
                            echo $this->Form->control("$key.users._ids", [
                                    'options' => $users,
                                'label' => 'Usuários'
                            ]);
                    ?>
                    <?php endforeach; ?>
                </fieldset>
            </div>
        </div>
    
    </div>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    
      // multible select
      $('select[multiple=multiple]').multiSelect({ 
        selectableOptgroup: true,
        selectableHeader: "<div class='custom-header'>Bloqueados</div>",
        selectionHeader: "<div class='custom-header'>Liberados</div>"
      });

</script>