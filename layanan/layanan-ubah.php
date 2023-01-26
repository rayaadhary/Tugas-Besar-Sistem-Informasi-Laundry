
<?php
session_start();
$title = 'Layanan';
require '../functions.php';


$id_layanan = $_GET['id_layanan'];
$sql = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
$edit = ambilsatubaris($conn,$sql);

if(isset($_POST['btn-simpan'])){
    $id_layanan= $_POST["id_layanan"];
    $nama       = $_POST['nm_layanan'];
    $harga       = $_POST['harga'];
    $query      = "UPDATE layanan SET id_layanan = '$id_layanan', nm_layanan = '$nama', no_tlp = '$harga' WHERE id_layanan ='$id_konsumen'";
    

    $execute = bisa($conn,$query);
    if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah data layanan';
        $type = 'success';
        header('location: layanan-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
}


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <h4 class="page-title">Ubah layanan  Laundry</h4>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
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
                        <input type="text" name="id_layanan" class="form-control" value="<?= $edit['id_layanan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama layanan</label>
                        <input type="text" name="nm_layanan" class="form-control" value="<?= $edit['nm_layanan'] ?>">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="<?= $edit['harga'] ?>">
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