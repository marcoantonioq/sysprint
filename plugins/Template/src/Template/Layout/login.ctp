
<!DOCTYPE html>
<html>
<head>
<!--
/*******************************************************************************
  Sistema de impressão
  2017 Marco Antônio Queiroz <marco.aq7@gmail.com>
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
  'Template.login.css',
  'Template.icons.css',
]); ?>
<?= $this->Html->script([
  'Template.jquery.min.js',
  'Template.bootstrap.min.js',
  // 'Template.multi-select.js',
  // 'Template.chart.js',
]);?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>



<body>
    
  <div id="content">
          <div class="login">
              <?= $this->Flash->render() ?>
              <?php echo $this->fetch('content'); ?>
          </div>
          
          <div id="helping" class="hide helping">
              <span class="close"></span>
              <b>Aluno/Professor:</b> Utilize seu login e senha de acesso ao IFG-ID, caso não tenha, procure o setor responsavel (<b>TI</b>).
              </p>
              <b>Visitante:</b> Solicite ao setor responsavel (<b>TI</b>) um voucher de acesso.
          </div>

  </div>

</body>

</html>
