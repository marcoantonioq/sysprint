<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Printer'), ['action' => 'edit', $printer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Printer'), ['action' => 'delete', $printer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Printers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Printer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="printers view large-9 medium-8 columns content">
    <h3><?= h($printer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($printer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Local') ?></th>
            <td><?= h($printer->local) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($printer->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($printer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month Count') ?></th>
            <td><?= $this->Number->format($printer->month_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quota Period') ?></th>
            <td><?= $this->Number->format($printer->quota_period) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Limite') ?></th>
            <td><?= $this->Number->format($printer->page_limite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('K Limit') ?></th>
            <td><?= $this->Number->format($printer->k_limit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($printer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($printer->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated Quota') ?></th>
            <td><?= h($printer->updated_quota) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allow') ?></th>
            <td><?= $printer->allow ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $printer->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descrition') ?></h4>
        <?= $this->Text->autoParagraph(h($printer->descrition)); ?>
    </div>
</div>
