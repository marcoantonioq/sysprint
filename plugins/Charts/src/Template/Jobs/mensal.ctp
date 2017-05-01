<?php
/**
  * @var \App\View\AppView $this
  */

$datasets['datasets'][] = [
    "label" => 'Mensal',
    "backgroundColor" => 'rgba(0, 136, 204, 0.3)',
    "hoverBackgroundColor" => "#08c",
    "data" =>  null
];

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
        $month[] .= $mes[ $charts->month ];
        $total[] .= $charts->sum;
    }
    $datasets['labels'] = $month;
    $datasets['datasets'][0]['data'] = $total;
    $datasets['datasets'][0]['backgroundColor'] = 'rgb(' . rand(128,255) . ',' . rand(128,255) . ',' . rand(128,255) . ')';
    $dataSet = json_encode($datasets, JSON_PRETTY_PRINT);
    ?>
        <summary>Resumo</summary>
        <table class="table">
            <tr>
                <th>Mês</th>
                <th>Total</th>
            </tr>
            <?php foreach ($datasets['labels'] as $id => $value): ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td><?php echo number_format($datasets['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
            </tr>
            <?php endforeach; ?>
        </table>
    <script type="text/javascript">
        var ctx = document.getElementById("myChartAnaul");
        var myChart = new Chart(ctx, {type: 'bar',data: <?=$dataSet?>});

    </script>

</div><?php
/**
  * @var \App\View\AppView $this
  */

$datasets['datasets'][] = [
    "label" => 'Mensal',
    "backgroundColor" => 'rgba(0, 136, 204, 0.3)',
    "hoverBackgroundColor" => "#08c",
    "data" =>  null
];

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
        $month[] .= $mes[ $charts->month ];
        $total[] .= $charts->sum;
    }
    $datasets['labels'] = $month;
    $datasets['datasets'][0]['data'] = $total;
    $datasets['datasets'][0]['backgroundColor'] = 'rgb(' . rand(128,255) . ',' . rand(128,255) . ',' . rand(128,255) . ')';
    $dataSet = json_encode($datasets, JSON_PRETTY_PRINT);
    ?>
        <summary>Resumo</summary>
        <table class="table">
            <tr>
                <th>Mês</th>
                <th>Total</th>
            </tr>
            <?php foreach ($datasets['labels'] as $id => $value): ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td><?php echo number_format($datasets['datasets'][0]['data'][$id],0,",","."); ?> páginas</td>
            </tr>
            <?php endforeach; ?>
        </table>
    <script type="text/javascript">
        var ctx = document.getElementById("myChartAnaul");
        var myChart = new Chart(ctx, {type: 'bar',data: <?=$dataSet?>});

    </script>

</div>