<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form">
<?= $this->Flash->render('auth') ?>

<?= $this->Form->create() ?>
        <h4 class="text-center">Por favor informe seu usuário e senha</h4>

        <?= $this->Form->input('username',['label'=>false, 'placeholder'=>'IFG-ID']) ?>
        <?= $this->Form->input('password',['label'=>false, 'placeholder'=>'SENHA']) ?>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>