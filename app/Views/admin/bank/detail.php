<?=$this->extend('admin/adminbase')?>
<?=$this->section('content')?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            Detail Bank <?= $bank['nama_bank']?>
            <span class="right badge badge-<?=((bool)$bank['status'])?'success':'danger'?>"><?=((bool)$bank['status'])?'Aktif':'Tidak Aktif'?></span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Kode Bank</span>
                        <span class="info-box-number text-center text-muted mb-0"><?=$bank['kode_bank']?></span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">No Rekening</span>
                        <span class="info-box-number text-center text-muted mb-0"><?=$bank['no_rek']?></span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Atas Nama</span>
                        <span class="info-box-number text-center text-muted mb-0"><?=$bank['atas_nama']?><span>
                    </span></span></div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Dibuat Pada</span>
                        <span class="parseDate info-box-number text-center text-muted mb-0"><?=$bank['created_at']?></span></div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Terakhir diubah</span>
                        <span class="parseDate info-box-number text-center text-muted mb-0"><?=$bank['updated_at']?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
<?=$this->endSection()?>
<?=$this->section('js');?>
<script src="<?=base_url('vendor/adminlte/plugins/moment/moment-with-locales.min.js')?>"></script>
<script>
$(document).ready(function(){
    date = "<?=$bank['created_at']?>"
    $('.parseDate').map(function(span){
        date = $(this).html()
        $(this).html(parseDate(date))
    })
})
function parseDate(date) {
    moment.locale('id')
    return moment(date).format('LLLL')
}
</script>
<?=$this->endSection();?>