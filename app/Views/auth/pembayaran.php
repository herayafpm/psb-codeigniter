<?= $this->extend('auth/layout') ?>
<?=$this->section('content')?>
<div class="card-body login-card-body">
<p class="login-box-msg"><?=$meta['title']?></p>
<?php if($session->getFlashdata('success')):?>
<div class="alert alert-success" role="alert">
  <strong><?=$session->getFlashdata('success');?></strong>
</div>
<?php endif;?>
<?php if($session->getFlashdata('error')):?>
<div class="alert alert-danger" role="alert">
  <strong><?=$session->getFlashdata('error');?></strong>
</div>
<?php endif;?>
<div class="row flex-column mb-1">
  <div class="col">
    <p>
      Silahkan isi form dibawah ini untuk mendapatkan username dan password
    </p>
  </div>
  <div class="col">
    <form action="<?=base_url('auth/pembayaran')?>" method="post" enctype='multipart/form-data'>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama'))?'is-invalid':'' ?>" id="nama" name='nama' value='<?=old('nama')?>' placeholder="Masukkan Nama Lengkap">
        <div class="invalid-feedback">
          <?= $validation->getError('nama')?>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control <?= ($validation->hasError('email'))?'is-invalid':'' ?>" id="email" name='email' value='<?=old('email')?>' placeholder="Masukkan Email Valid">
        <div class="invalid-feedback">
          <?= $validation->getError('email')?>
        </div>
      </div>
      <div class="form-group">
        <label for="no_hp">NO HP / Whatsapp</label>
        <input type="number" class="form-control <?= ($validation->hasError('no_hp'))?'is-invalid':'' ?>" id="no_hp" name='no_hp' value='<?=old('no_hp')?>' placeholder="Masukkan No HP">
        <div class="invalid-feedback">
          <?= $validation->getError('no_hp')?>
        </div>
      </div>
      <div class="form-group">
        <label for="bukti">Bukti Pembayaran</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input <?= ($validation->hasError('bukti'))?'is-invalid':'' ?>" id="bukti" name='bukti'>
          <div class="invalid-feedback">
            <?= $validation->getError('bukti')?>
          </div>
          <label class="custom-file-label" for="bukti">Pilih Gambar ...</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-md btn-block">Kirimkan</button>
      </div>
    </form>
  </div>
</div>
<p class="mb-0 mt-2">
  <a href="<?=base_url('auth/login')?>" class="text-center">Sudah mendaftar, Silahkan Login</a>
</p>
</div>
<!-- /.login-card-body -->
<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<script>
  $(document).ready(function(){
  })
</script>
<?= $this->endSection('js'); ?>