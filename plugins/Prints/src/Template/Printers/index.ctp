<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="row">
    <?php foreach ($printers as $key => $printer): ?>
            <div class="col-xs-6 col-sm-3">
                
                    <?= $this->Html->link(
                            $this->Html->image('Template./img/icons/print.png',['class'=>'img-thumbnail'])."<h5>${printer['name']}</br><small>${printer['status']}</small></h5>", 
                            [
                                'plugin'=>'prints', 
                                'controller'=>'printers', 
                                'action' => 'spool',
                                $printer['name']
                            ],
                            [
                                'escape'=>false
                            ]
                    )?>
               
            </div>
    <?php endforeach; ?>
</div>