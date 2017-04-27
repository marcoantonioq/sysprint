
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
'bootstrap.min.css',
// 'bootstrap-theme.min.css',
'print.css',
]); ?>
<?= $this->Html->script([
'jquery.min.js',
'bootstrap.min.js',
]);?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>

<body>
    <div class="container-fluid">

      <div class="btn-group hidden-print">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Mais <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">              
              <li>
                <?= $this->Html->link('Perfil', ['plugin'=>'AuthUser', 'controller'=>'users', 'action' => 'perfil']) ?>
              </li>
              <li> <!-- <li class="active"> -->
                <?= $this->Html->link('Impressoras', ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'index']) ?>
              </li>
              <li> <!-- <li class="active"> -->
                <?= $this->Html->link('Charts', ['plugin'=>'Charts', 'controller'=>'jobs', 'action' => 'index']) ?>
              </li>
              <li>
                <?= $this->Html->link('Configurações', ['plugin'=>'App', 'controller'=>'settings', 'action' => 'index']) ?>
              </li>
              <li><a href="#">Ajuda</a></li>
          </ul>
        </div>
      <?= $this->Flash->render() ?>


      <div class="container clearfix">
          <?= $this->fetch('content') ?>
      </div>
      <footer></footer>
    </div>
</body>
</html>
