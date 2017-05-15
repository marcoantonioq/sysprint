
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
  'Template.chart.js',
]);?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>



<body>
    <div id="wrapper" class="">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav hidden-print">
                <li class="sidebar-brand">
                    <?= $this->Html->link('<i class="fa fa-desktop" aria-hidden="true"></i> Home', '/',['escape'=>false]) ?>
                </li>
                <?php if( strcmp( $this->request->session()->read('Auth.User.rule') , "admin") ): ?>
                <li> 
                  <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> Perfil', 
                      ['plugin'=>'AuthUser', 'controller'=>'users', 'action' => 'view'],
                      ['escape'=>false]
                      ) ?>
                </li>
                <?php endif; ?>
                <li> 
                  <?= $this->Html->link('<i class="fa fa-print" aria-hidden="true"></i> Impressoras', 
                      ['plugin'=>'prints', 'controller'=>'printers', 'action' => 'index'],
                      ['escape'=>false]
                      ) ?>
                </li>
                <?php if( strcmp( $this->request->session()->read('Auth.User.rule') , "admin") ): ?>
                <li> 
                  <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> Charts', 
                      ['plugin'=>'Charts', 'controller'=>'jobs', 'action' => 'index'],
                      ['escape'=>false]
                      ) ?>
                </li>
                <?php endif; ?>
                <?php if( strcmp( $this->request->session()->read('Auth.User.rule') , "admin") ): ?>
                <li>
                  <?= $this->Html->link('<i class="fa fa-cogs" aria-hidden="true"></i> Configurações', 
                      ['plugin'=>'sys', 'controller'=>'settings', 'action' => 'index'],
                      ['escape'=>false]
                      ) ?> 
                </li>
                <?php endif; ?>
                <li> 
                  <?= $this->Html->link('<i class="fa fa-question-circle-o" aria-hidden="true"></i> Ajuda', 
                      ['plugin'=>'sys', 'controller'=>'settings', 'action' => 'debug'],
                      ['escape'=>false]
                      ) ?>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a class="hidden-print" href="#menu-toggle" id="menu-toggle"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></a>
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
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(".refresh").click(function(e) {
        e.preventDefault();
        $(this).addClass("fa-spin");
    });

    $(document).ready(function () {
      // resolução cell toglled menu lateral
       if ((window.screen.availHeight < 750) && (window.screen.availWidth < 750)) {
          $("#wrapper").toggleClass("toggled");
       }
    })
    </script>

</body>

</html>
