<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="row-fluid">
        <?php
        echo $this->Html->link('<i class="fa fa-print" aria-hidden="true"></i> Imprimir relatório',
            "#",
            [
                'class'=> 'btn btn-default',
                "onclick"=>"window.print()",
                'escape'=>false
            ])." ";
        echo $this->Html->link('<i class="refresh fa fa-refresh" aria-hidden="true"></i> Atualizar relatório',
            ['action' => 'backGroundUpdates'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
            ?>
</div>

<form class="navbar-form navbar-left">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
        <select class="form-control" name="select">
            <option value="valor1" selected>Impressora</option>
            <option value="valor2">Impressora 1</option> 
            <option value="valor3">Impressora 1</option>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
</form>

<?=$this->element('Charts.menu_charts'); ?>

<div class="row-fluid">
    <div class="table-responsive">
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('printer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pages') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copies') ?></th>
                <th scope="col"><?= $this->Paginator->sort('host') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('params') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="cotal"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Number->format($job->id) ?></td>
                <td><?= $job->has('user') ? $this->Html->link($job->user->name, ['controller' => 'Users', 'action' => 'view', $job->user->id]) : '' ?></td>
                <td><?= $job->has('printer') ? $this->Html->link($job->printer->name, ['controller' => 'Printers', 'action' => 'view', $job->printer->id]) : '' ?></td>
                <td><?= h($job->date) ?></td>
                <td><?= $this->Number->format($job->pages) ?></td>
                <td><?= $this->Number->format($job->copies) ?></td>
                <td><?= h($job->host) ?></td>
                <td><?= h($job->file) ?></td>
                <td><?= h($job->params) ?></td>
                <td><?= h($job->status) ?></td>
                <td><?= h($job->created) ?></td>
                <td><?= h($job->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i>', 
                        ['action' => 'view', $job->id],
                        ['escape'=>false]
                    ) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', 
                        ['action' => 'edit', $job->id],
                        ['escape'=>false]
                    ) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i>', 
                        ['action' => 'delete', $job->id], 
                        [
                            'escape'=>false,
                            'confirm' => __('Apagar definitivo # {0}?', $job->id),
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
