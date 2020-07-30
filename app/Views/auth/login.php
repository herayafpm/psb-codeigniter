<?= $this->extend('auth/layout') ?>
<?=$this->section('content')?>
<div class="card-body login-card-body">
<p class="login-box-msg">Masuk untuk memulai</p>
<?php if($session->getFlashdata('message')):?>
<div class="alert alert-danger" role="alert">
  <strong><?=$session->getFlashdata('message');?></strong>
</div>
<?php endif;?>
<form action="<?=base_url('auth/login')?>" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control <?= ($validation->hasError('username'))?'is-invalid':'' ?>" name='username' value='<?=old('username')?>' placeholder="Username">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
    <div class="invalid-feedback">
      <?= $validation->getError('username')?>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control <?= ($validation->hasError('password'))?'is-invalid':'' ?>" name='password' value='<?=old('password')?>' placeholder="Password">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
    <div class="invalid-feedback">
      <?= $validation->getError('password')?>
    </div>
  </div>
    <div class="row">
    <!-- /.col -->
    <div class="col">
      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
    </div>
    <!-- /.col -->
  </div>
</form>
<!-- /.social-auth-links -->

<p class="mb-1">
  <a href="<?=base_url('auth/forgot')?>">Lupa kata sandi?</a>
</p>
<p class="mb-0">
  <a href="<?=base_url('auth/register')?>" class="text-center">Mendaftar menjadi santri</a>
</p>
</div>
<!-- /.login-card-body -->
<?= $this->endSection('content'); ?>