<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row-fluid">
    <?php
    echo $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Novo usuário',
        ['controller' => 'users', 'action' => 'add'],
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

<div class="users index large-9 medium-8 columns content">
    <h3>Usuários</h3>
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->rule) ?></td>
                <td><?= h($user->status) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i>', 
                        ['action' => 'view', $user->id],
                        ['escape'=>false]
                    ) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', 
                        ['action' => 'edit', $user->id],
                        ['escape'=>false]
                    ) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i>', 
                        ['action' => 'delete', $user->id], 
                        [
                            'escape'=>false,
                            'confirm' => __('Apagar definitivo # {0}?', $user->id),
                        ]
                    ) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <?= $this->element('Template.pagination'); ?>
</div>
