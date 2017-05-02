<div class="row-fluid">
    <h4>Configurações</h4>
    <ul>
        <li> <?= $this->Html->link('Aplicação', ['plugin'=>'App', 'controller'=>'settings', 'action' => 'edit']) ?></li>
        <li> <?= $this->Html->link('Quotas', ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'quota']) ?></li>
    </ul>
</div>