<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="row-fluid">
    <?= $this->Form->create($spool, [
        'type'=>'file',
        'class' => 'form-horizontal',
    ]); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Imprimir">Imprimir</a></li>
        <li><a data-toggle="tab" href="#Options">+Opções</a></li>
    </ul>
    <div class="tab-content">
        <div id="Imprimir" class="tab-pane fade in active">
            <legend><?php echo __('Imprimir'); ?></legend>

            <?php
            echo $this->Form->control('user_id', array(
                'label'=>false,
                'empty'=>'Selecione usuário...',
                'class'=>'form-control',
            ));

            echo $this->Form->control('file[]', array(
                'label'=>false,
                'type'=>'file',
                'multiple'=>true,
            ));

            echo $this->Form->control('printers', [
                'label'=>false,
                'empty'=>"Selecione impressora...",
                'class'=>'form-control',
            ]);

            ?>
            
            <div class="col-sm-6">                
            <?php  
            echo $this->Form->control('params.copies', array(
                'div' => 'col-sm-2',
                'label' => 'Cópias:',
                'value'=>1,
                'class'=>'form-control',
            ));

             ?>
            </div>

            <div class="col-sm-6">                 
            <?php 
            echo $this->Form->control('params.pages', array(
                'label'=>"Página(s):",
                'type'=>'text',
                'div'=>'span4',
                'placeholder'=>'ex: 1-5 or 2,3,4',
                'class'=>'form-control',
            ));
             ?>
            </div>
        </div>

        
        <div id="Options" class="tab-pane fade">
               <?php 

               echo $this->Form->control('params.double_sided', array(
                'label'=>"Frente e verso:",
                'type'=>'select',
                'class'=>'form-control',
                'empty'=>'Não - Um lado',
                'default'=>'two-sided-long-edge',
                'options'=>array(
                    'two-sided-long-edge'=>'Sim - Virar na borda(retrato)',
                    'two-sided-short-edge'=>'Sim - Virar na borda(paisagem)',
                )
            ));

            echo $this->Form->control('params.page_set', array(
                'label'=>"Apenas imprimir:",
                'type'=>'select',
                'class'=>'form-control',
                'empty'=>'Todas folhas',
                'options'=>array(
                    'even'=>'Folhas pares',
                    'odd'=>'Folhas impares',
                )
            ));

            echo $this->Form->control('params.media', array(
                'label'=>"Tamanho do papel:",
                'type'=>'select',
                'class'=>'form-control',
                'default'=>'A4',
                'options'=>array(
                    'A3'=>'A3',
                    'A4'=>'A4',
                    'A5'=>'A5',
                    'A6'=>'A6',
                )
            ));

            echo $this->Form->control('params.orientation', array(
                'label'=>"Orientação",
                'type'=>'select',
                'class'=>'form-control',
                'default'=>'3',
                'options'=>array(
                    '3'=>'retrato',
                    '4'=>'paisagem',
                )
            )); 

         ?>            
        </div>

        <div class="input">
             
        <?php 

            echo $this->Form->control('host', array(
                'label'=>ucfirst(__('host')),
                'type'=>'hide',
                'value'=>$_SERVER['REMOTE_ADDR'],
                'class'=>'form-control',
            ));           
               echo $this->Html->link('Cancelar',
                    array('controller'=>'printers', 'action' => 'index'),
                    array('class'=> 'btn btn-danger', 'escape'=>false)
                )." ";
                
                echo $this->Form->button('Limpar', array(
                    'type'=>'reset',
                    'class'=>'btn btn-warning'
                ))." ";
                echo $this->Form->button('Imprimir', array(
                    'class'=>'btn btn-success'
                ));

                echo $this->Form->end();

                ?>
         </div>

    </div>   
</div>