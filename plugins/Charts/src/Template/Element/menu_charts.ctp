
<div class="row">
    <div class="col-md-12">
        <br>        
        <ul class="nav nav-tabs">
            <li>
                <?=$this->Html->link('Todos Trabalhos',[
                    'controller'=>'jobs',
                    'action'=>'index'
                ]) ?>
            </li>
            <li>
                <?=$this->Html->link('Impressoras',[
                    'controller'=>'jobs',
                    'action'=>'type',
                    'impressoras'
                ]) ?>
            </li>
            <li>
                <?=$this->Html->link('Usuários',[
                    'controller'=>'jobs',
                    'action'=>'type',
                    'usuários'
                ]) ?>
            </li>
            <li>
                <?=$this->Html->link('Anual',[
                    'controller'=>'jobs',
                    'action'=>'type',
                    'anual'
                ]) ?>
            </li>
        </ul>
    </div>
</div>
