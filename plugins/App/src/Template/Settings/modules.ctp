<?php
// use Cake\Core\Configure;

?>
<div class="row-fluid">
        <?php
            echo $this->Html->link('<i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar',
            ['action' => 'index'],
            [
                'class'=> 'btn btn-default',
                'escape'=>false
            ])." ";
        ?>
</div>


<div class="row-fluid">
        <table class="table">
            <thead>                
                <tr>
                    <td>Name</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modules as $name => $module): ?>
                <tr>
                    <td>
                        <?= $name?>                    
                    </td>
                    <td>
                        <?= ($module['enable'])?"Ativado":"Desativado"; ?>                    
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

</div>