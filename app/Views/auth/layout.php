<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$app_name?> | <?= $meta['title']?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content='<?=$meta['description']?> ' name='description'/>
  <meta content='<?=$meta['keywords']?> ' name='keywords'/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/vendor/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>"><b><?=$app_name?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <?=$this->renderSection('content')?>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/vendor/adminlte/js/adminlte.min.js"></script>
<?= $this->renderSection('js')?>
</body>
</html>
