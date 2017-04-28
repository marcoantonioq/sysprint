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

      echo $this->Html->link('Cancelar',
        array('action' => 'index'),
        array('class'=> 'btn')
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
