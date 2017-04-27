<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Printers'), ['controller' => 'Printers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Printer'), ['controller' => 'Printers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $job->has('user') ? $this->Html->link($job->user->name, ['controller' => 'Users', 'action' => 'view', $job->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Printer') ?></th>
            <td><?= $job->has('printer') ? $this->Html->link($job->printer->name, ['controller' => 'Printers', 'action' => 'view', $job->printer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Host') ?></th>
            <td><?= h($job->host) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($job->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Params') ?></th>
            <td><?= h($job->params) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($job->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pages') ?></th>
            <td><?= $this->Number->format($job->pages) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copies') ?></th>
            <td><?= $this->Number->format($job->copies) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($job->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($job->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($job->modified) ?></td>
        </tr>
    </table>
</div>
