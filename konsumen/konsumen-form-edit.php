<?php
$title = 'Konsumen';
require '../functions.php';

$jabatan = ['pemilik','penjaga laundry'];

$id_konsumen = $_GET['id_konsumen'];
$sql = "SELECT * FROM konsumen WHERE id_konsumen = '$id_konsumen '";
$edit = ambilsatubaris($conn,$sql);

if(isset($_POST['btn-simpan'])){
    $id_konsumen= $_POST["id_konsumen"];
    $nama       = $_POST['nm_konsumen'];
    $telp       = $_POST['no_tlp'];
    $query      = "UPDATE konsumen SET id_konsumen = '$id_konsumen', nm_konsumen = '$nama', no_tlp = '$telp' WHERE id_konsumen ='$id_konsumen'";
    

    $execute = bisa($conn,$query);
    if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah data konsumen';
        $type = 'success';
        header('location: konsumen-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
}


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Ubah Data Konsumen</h4>
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
                        <input type="text" name="id_konsumen" class="form-control" value="<?= $edit['id_konsumen'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" name="nm_konsumen" class="form-control" value="<?= $edit['nm_konsumen'] ?>">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_tlp" class="form-control" value="<?= $edit['no_tlp'] ?>">
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