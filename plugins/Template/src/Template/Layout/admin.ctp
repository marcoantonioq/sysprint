
<!DOCTYPE html>
<html>
<head>
<!--
/*******************************************************************************
  Sistema de impressão
  2015 Marco Antônio Queiroz <marco.aq7@gmail.com>
*******************************************************************************/

  * Copyright 2017
 * Licensed ****
 *
 * Desenvolvido por:
 *  Marco Antônio Queiroz
 *  Tec. de Tecnologia Da Informação,
 *  Analista Desenvolvedor de Sistemas
 */
-->
<?= $this->Html->charset('UTF-8'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>
  Sysprint
  <?= $this->fetch('title') ?>
</title>

<?= $this->Html->meta('icon') ?>
<?= $this->Html->css([
  'Template.bootstrap.min.css',
  'Template.bootstrap-theme.min.css',
  'Template.print.css',
  'Template.multi-select.css',
]); ?>
<?= $this->Html->script([
  'Template.jquery.min.js',
  'Template.bootstrap.min.js',
  'Template.multi-select.js',
]);?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>

<body>
    <div class="container-fluid">
    
      <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li> <?= $this->Html->link('Perfil', ['plugin'=>'AuthUser', 'controller'=>'users', 'action' => 'perfil']) ?></li>
                <li> <!-- <li class="active"> --> <?= $this->Html->link('Impressoras', ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Charts', ['plugin'=>'Charts', 'controller'=>'jobs', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Configurações', ['plugin'=>'App', 'controller'=>'settings', 'action' => 'index']) ?></li>
                <li><a href="#">Ajuda</a></li>
              </ul>
              
        </div>
        <ul class="nav navbar-nav">
            <li><?= $this->Html->link( 'Geral', ['plugin'=>'app','controller'=>'settings', 'action' => 'index'])?></li>
            <li class="active"><?= $this->Html->link( 'Impressoras', ['plugin'=>'prints','controller'=>'printers', 'action' => 'quota'])?></li>
            <li><?= $this->Html->link( 'Atualizar', ['plugin'=>'app','controller'=>'settings', 'action' => 'update'])?></li>
        </ul>
    </div>
    </nav>

    <?= $this->Flash->render() ?>




      <div class="container clearfix">
          <?= $this->fetch('content') ?>
      </div>
      <footer></footer>
    </div>

    <script type="text/javascript">
      // multible select
      $('select[multiple=multiple]').multiSelect({ 
        selectableOptgroup: true,
        selectableHeader: "<div class='custom-header'>Itens selecionáveis</div>",
        selectionHeader: "<div class='custom-header'>Itens selecionados</div>"
      });
    </script>
</body>
</html>
