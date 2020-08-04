<?=$this->extend('admin/adminbase')?>
<?=$this->section('content')?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Bank</h3>
        </div>
        <div class="card-body">
        <form action="<?=base_url('admin/bank/tambah')?>" method="post">
            <div class="form-group">
                <label class="col-form-label" for="nama_bank">Nama Bank</label>
                <input type="text" class="form-control <?=($validation->hasError('nama_bank'))?'is-invalid':''?>" id="nama_bank" name='nama_bank' value="<?=old('nama_bank')?>" placeholder="Masukkan Nama Bank">
                <div class="invalid-feedback">
                    <?=$validation->getError('nama_bank')?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="kode_bank">Kode Bank</label>
                <input type="number" class="form-control <?=($validation->hasError('kode_bank'))?'is-invalid':''?>" id="kode_bank" name='kode_bank' value="<?=old('kode_bank')?>" placeholder="Masukkan Kode Bank">
                <div class="invalid-feedback">
                    <?=$validation->getError('kode_bank')?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="no_rek">No Rek.</label>
                <input type="number" class="form-control <?=($validation->hasError('no_rek'))?'is-invalid':''?>" id="no_rek" name='no_rek' value="<?=old('no_rek')?>" placeholder="Masukkan No Rek.">
                <div class="invalid-feedback">
                    <?=$validation->getError('no_rek')?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="atas_nama">Atas Nama</label>
                <input type="text" class="form-control <?=($validation->hasError('atas_nama'))?'is-invalid':''?>" id="atas_nama" name='atas_nama' value="<?=old('atas_nama')?>" placeholder="Masukkan Atas Nama">
                <div class="invalid-feedback">
                    <?=$validation->getError('atas_nama')?>
                </div>
            </div>
            <div class="form-group">
            <label class="col-form-label" for="status">Aktif?</label>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name='status' id="status" value="1" checked>
                <label for="status" class="custom-control-label">Ya</label>
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    <!-- /.card -->
</div>
<?=$this->endSection()?>