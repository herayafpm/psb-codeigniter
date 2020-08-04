<?=$this->extend('admin/adminbase')?>
<?=$this->section('css')?>
<link rel="stylesheet" href="<?=base_url()?>/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.css">
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="col-12">
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data Bank</h3>

    <div class="card-tools d-flex align-items-center">
        <a class="btn btn-success mr-2" href='<?=base_url('admin/bank/tambah')?>' role='button'>Tambah bank</a>
        <form action="<?=base_url('admin/bank')?>" method="get">
            <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="cari" class="form-control float-right" value="<?=$cari?>" placeholder="Cari Bank">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="max-height: 50vh;">
    <table class="table table-striped table-head-fixed projects">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama Bank</th>
            <th>Aktif?</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach($banks as $bank): ?>
        <tr>
            <td><?=$no?></td>
            <td class="text-uppercase"><?=$bank['nama_bank']?></td>
            <td class='text-capitalize'><?= ((bool)$bank['status'])?'ya':'tidak'?></td>
            <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="<?=base_url('admin/bank/detail').'/'.$bank['id']?>">
                    <i class="fas fa-folder">
                    </i>
                    Detail
                </a>
                <a class="btn btn-info btn-sm" href="<?=base_url('admin/bank/ubah').'/'.$bank['id']?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Ubah
                </a>
                <form class="d-inline formDelete" action="<?=base_url('admin/bank/delete').'/'.$bank['id']?>" method="post">
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash">
                        </i>
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        <?php
        $no++;
        endforeach;?>
        </tbody>
    </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-md m-0 float-right">
            <?php for ($i=1; $i <= $pagination ; $i++):?>
                <li class="page-item <?=($i == $page)?'disabled':''?>"><a class="page-link" href="#"><?=$i?></a></li>
            <?php endfor;?>
        </ul>
    </div>
</div>
<!-- /.card -->
</div>
<?=$this->endSection()?>

<?=$this->section('js')?>
<script src="<?=base_url()?>/vendor/adminlte/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
$('.formDelete').on('submit',function (e){
    e.preventDefault()
    var form = this;
    Swal.fire({
        title: 'Yakin ingin menghapusnya?',
        text: "Kamu tidak akan bisa mengembalikannya nanti!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Saja!',
        cancelButtonText:'Tidak',
        }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})
</script>
<?=$this->endSection()?>