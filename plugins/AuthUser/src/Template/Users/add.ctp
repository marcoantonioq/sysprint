<?php
/**
  * @var \App\View\AppView $this
  */
?>

    <?= $this->Form->create($user) ?>


<div class="row-fluid">
        <?php
            echo $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Cancelar',
            ['action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
            echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar',['class'=>'btn btn-success']) 
        ?>
</div>


<div class="row-fluid">
    <fieldset>
        <legend>Novo usuário</legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('email');
            echo $this->Form->control('status');
            echo $this->Form->control('adress');
            echo $this->Form->control('thumbnailphoto');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
