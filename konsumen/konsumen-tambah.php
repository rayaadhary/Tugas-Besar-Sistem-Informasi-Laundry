<?php
$title = 'Konsumen';
require '../functions.php';
$konsumen = ambildata($conn,'SELECT * FROM konsumen');
if(isset($_POST['btn-simpan'])){
     $nama          = $_POST['nm_konsumen'];
     $telp          = $_POST['no_tlp'];

    $query = "INSERT INTO konsumen (nm_konsumen,no_tlp) 
    values ('$nama','$telp')";
     
     $execute = bisa($conn,$query);
     if($execute == 1){
         $success = 'true';
         $title = 'Berhasil';
         $message = 'Berhasil menambahkan konsumen baru';
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
            <h4 class="page-title">Data Tambah Konsumen</h4>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" name="nm_konsumen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_tlp" class="form-control">
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