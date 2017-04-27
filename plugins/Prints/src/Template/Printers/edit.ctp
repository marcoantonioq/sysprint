<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $printer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $printer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Printers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="printers form large-9 medium-8 columns content">
    <?= $this->Form->create($printer) ?>
    <fieldset>
        <legend><?= __('Edit Printer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('month_count');
            echo $this->Form->control('local');
            echo $this->Form->control('descrition');
            echo $this->Form->control('allow');
            echo $this->Form->control('status');
            echo $this->Form->control('ip');
            echo $this->Form->control('quota_period');
            echo $this->Form->control('page_limite');
            echo $this->Form->control('k_limit');
            echo $this->Form->control('updated_quota', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
