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
        echo $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> Usuários',
            ['controller' => 'jobs', 'action' => 'users'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";

            ?>
</div>


<div class="row-fluid">

    <canvas id="myChartAnaul" ></canvas>

    <?php
    $month = array();
    $total = array();
    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

    foreach ($charts_anual as $charts) {
        pr($charts->date->toArray()); exit;
        // $month[] .= ;
        $total[] .= $charts->sum;
    }
    $data = array();
    $data['labels'] = $month;
    $data['datasets'][] = array(
        "label" => 'Mensal',
        "backgroundColor" => 'rgba(0, 136, 204, 0.3)',
        "borderColor" => "#08c",
        "borderWidth" => 1,
        "hoverBackgroundColor" => "#08c",
        "data" =>  $total
        );
    $dataSet = json_encode($data, JSON_PRETTY_PRINT);
    pr($dataSet); exit;
    ?>


        <summary>Resumo</summary>
        <table>
            <tr>
                <th>Mês</th>
                <th>Total</th>
            </tr>
            <?php foreach ($data['labels'] as $id => $value): ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td><?php echo number_format($data['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
            </tr>
            <?php endforeach; ?>
        </table>
    <script type="text/javascript">

        var ctx = document.getElementById("myChartAnaul");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: <?=$dataSet; ?>
        });

    </script>

</div>








<div class="row-fluid">
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
