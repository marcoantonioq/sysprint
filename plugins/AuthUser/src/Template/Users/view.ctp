<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="row-fluid">
        <?php
        echo $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> Todos usuários',
            ['controller' => 'users', 'action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";

        echo $this->Html->link('<i class="fa fa-lock"></i> Logout',
            ['controller' => 'users', 'action' => 'logout'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
            ?>
</div>

<div class="">
    <h3><?= h($user->name) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($user->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Thumbnailphoto') ?></h4>
        <?= $this->Text->autoParagraph(h($user->thumbnailphoto)); ?>
    </div>
    
</div>
