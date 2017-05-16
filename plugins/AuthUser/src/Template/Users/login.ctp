<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form">
<?= $this->Flash->render('auth') ?>

<?= $this->Form->create() ?>
		<?php 
			echo $this->Html->image('Template./img/banner.png',
				['class'=>"text-center"]
			);
		 ?>

        <h6>Por favor informe seu usuário e senha</h6>

        <?= $this->Form->input('username',['label'=>false, 'placeholder'=>'IFG-ID']) ?>
        <?= $this->Form->input('password',['label'=>false, 'placeholder'=>'SENHA']) ?>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>