
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Marco Antônio Queiroz">
<meta name="description" content="Servidor de impressão">
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
  'Template.simple-sidebar.css',
  'Template.icons.css',
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

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <?= $this->Html->link('Home', '/') ?>
                </li>
                <li> <?= $this->Html->link('Perfil', ['plugin'=>'AuthUser', 'controller'=>'users', 'action' => 'perfil']) ?></li>
                <li> <?= $this->Html->link('Impressoras', ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'index']) ?></li>
                <li> <?= $this->Html->link('Charts', ['plugin'=>'Charts', 'controller'=>'jobs', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Configurações', ['plugin'=>'App', 'controller'=>'settings', 'action' => 'index']) ?> <ul>
                  <li> <?= $this->Html->link('Quotas', ['plugin'=>'Prints', 'controller'=>'printers', 'action' => 'quota']) ?></li>
                </ul></li>
                <li> <a href="#">Ajuda</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></a>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-xs-12">
                      <?= $this->Flash->render() ?>
                    </div>
                </div>
                <div class="row-fluid">
                  <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
     <footer></footer>

    <script type="text/javascript">
      // multible select
      $('select[multiple=multiple]').multiSelect({ 
        selectableOptgroup: true,
        selectableHeader: "<div class='custom-header'>Itens selecionáveis</div>",
        selectionHeader: "<div class='custom-header'>Itens selecionados</div>"
      });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function () {
      // alert(window.screen.availHeight);
       if ((window.screen.availHeight < 750) && (window.screen.availWidth < 750)) {
          $("#wrapper").toggleClass("toggled");
       }
    })
    </script>

</body>

</html>
