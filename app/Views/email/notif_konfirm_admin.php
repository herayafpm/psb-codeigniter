<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notif Admin Konfrimasi</title>
</head>
<body>
  <header>
  <h1>
  Notifikasi Konfirmasi Pendaftaran Admin
  </h1>
  <p>
    Detail: <br>
    Nama: <?=$data['nama']?> <br>
    Email: <?=$data['email']?> <br>
    no_hp: <?=$data['no_hp']?> <br>
    bukti: <b>Di Lampiran</b> <br>
  </p>
  <p>
    untuk detail lebih lanjut, klik dibawah ini
  </p>
  <div>
  <a href="<?=base_url('admin')?>">Klik Disini</a>
  </div>
  </header>
</body>
</html>