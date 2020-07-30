<?= $this->extend('auth/layout') ?>
<?=$this->section('content')?>
<div class="card-body login-card-body">
<p class="login-box-msg"><?=$meta['title']?></p>
<?php if(!empty($tahunAjaran)):?>
<div class="row flex-column mb-1">
  <div class="col">
    <p>Kuota saat ini: <b><?=$tahunAjaran->kuota?></b></p>
    <p>
      Silahkan
      Melakukan transfer uang sebanyak Rp. <b><span id='biaya_daftar'><?=$tahunAjaran->biaya_daftar?></span></b> untuk pembayaran biaya pendaftaran santri baru, melalui rekening <br>
    </p>
  </div>
  <div class="col">
    <ul class="nav nav-pills nav-sidebar flex-column accordion" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <?php foreach($banks as $bank):?>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>
            <?=$bank['nama_bank']?>
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview text-justify">
          No. Rekening : <b><?=$bank['no_rek']?></b> a.n <b><?=$bank['atas_nama']?></b> Kode Bank <b><?=$bank['kode_bank']?><b> <b><?=$bank['nama_bank']?><b>
        </ul>
      </li>
      <?php endforeach;?>
      </ul>
  </div>
</div>

<p class="mb-1 mt-2">
  Jika sudah transfer uang klik dibawah ini
</p>
<a class="btn btn-success btn-block" href="<?=base_url('auth/pembayaran')?>" role="button">Konfirmasi Pembayaran</a>
<?php else: ?>
<p class="mb-1 mt-2">
  Maaf Pendaftaran sudah ditutup, terima kasih ...
</p>
<?php endif;?>
<p class="mb-0 mt-2">
  <a href="<?=base_url('auth/login')?>" class="text-center">Sudah mendaftar, Silahkan Login</a>
</p>
</div>
<!-- /.login-card-body -->
<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<script>
  function change_rupiah(angka,prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  } 
  $(document).ready(function(){
    $uang = $('#biaya_daftar').html();
    $('#biaya_daftar').html(change_rupiah($uang))
  })
</script>
<?= $this->endSection('js'); ?>