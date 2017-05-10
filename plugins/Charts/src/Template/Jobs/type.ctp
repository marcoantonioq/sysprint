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
            ?>
</div>

<?=$this->element('Charts.menu_charts'); ?>

<div class="row-fluid">

    <canvas id="myChart" ></canvas>
        <?php 
        // pr($charts->datasets[0]['data']); exit;
             ?>
        <summary>Resumo</summary>
        <table class="table">
            <tr>
                <th><?=$charts->data['datasets'][0]['label']; ?></th>
                <th>Total</th>
            </tr>
            <?php foreach ($charts->data['labels'] as $id => $value): ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td><?php echo number_format($charts->data['datasets'][0]['data'][$id],0,",","."); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <script type="text/javascript">
        var ctx = document.getElementById("myChart");

        var myChart = new Chart(ctx, <?=json_encode($charts, JSON_PRETTY_PRINT)?>);

    </script>
