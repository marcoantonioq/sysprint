<div class="row-fluid">
    <div class="col-xs-12">
        
        <?php 
        echo $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar',
            ['plugin'=>'app', 'controller' => 'settings', 'action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";

            if($version): 

            echo $this->Form->postLink('<i class="fa fa-refresh" aria-hidden="true"></i>Atualizar',
                array('action' => 'update'),
                array(
                    'class'=> 'btn btn-success',
                    'escape'=>false
                ),
                        __('Tem certeza de que deseja atualizar o sistema? (Faça backup)')
              )." ";

              echo $this->Form->postLink('DB Defaul',
                array('action' => 'restoreDB'),
                array('class'=> 'btn btn-danger'),
                        __('Alerta!!! Tem certeza de que deseja restaurar banco de dados padrão de fabrica? (Faça backup)')
              )." ";
        ?>
        
                <h3>Já está disponível a nova versão do aplicativo: <?php echo $version; ?></h3>
        <?php else: ?>
                <h3>Parabéns!!! Versão recente.</h3>
        <?php endif; ?>
    </div>
</div>
