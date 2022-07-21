<?php
$title = 'Penjaga-Laundry';
require '../functions.php';

$jabatan = ['pemilik','penjaga laundry'];

$id_pegawai = $_GET['id_pegawai'];
$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai '";
$edit = ambilsatubaris($conn,$sql);

if(isset($_POST['btn-simpan'])){
    $nama     = $_POST['nm_pegawai'];
    $telp = $_POST['no_tlp'];
    $jabatan     = $_POST['jabatan'];
    $query = "UPDATE pegawai SET nm_pegawai = '$nama', no_tlp = '$telp', jabatan = '$jabatan' WHERE id_pegawai ='$id_pegawai'";
    

    $execute = bisa($conn,$query);
    if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah ' .$jabatan;
        $type = 'success';
        header('location: penjaga-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
}


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Ubah Data Penjaga Laundry</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id_pegawai" class="form-control" value="<?= $edit['id_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Penjaga Laundry</label>
                        <input type="text" name="nm_pegawai" class="form-control" value="<?= $edit['nm_pegawai'] ?>">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_tlp" class="form-control" value="<?= $edit['no_tlp'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control">
                                <?php foreach ($jabatan as $key) { ?>
                                <?php if ($key == $edit['jabatan']) ?>
                                <option value="<?= $key ?>" selected><?= $key ?></option>    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../layout/layout_footer.php';
?>