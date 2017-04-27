<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Printers'), ['controller' => 'Printers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Printer'), ['controller' => 'Printers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs index large-9 medium-8 columns content">
    <h3><?= __('Jobs') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
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
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
