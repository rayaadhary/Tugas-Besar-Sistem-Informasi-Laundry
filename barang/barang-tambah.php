<?php
$title = 'Barang';
require '../functions.php';
$barang = ambildata($conn,'SELECT * FROM barang');
if(isset($_POST['btn-simpan'])){
     $kd_cucian          = $_POST['kd_cucian'];
     $nm_barang          = $_POST['nm_barang'];
     $id_konsumen          = $_POST['id_konsumen'];
     $deskripsi          = $_POST['deskripsi'];
    
    $query = "INSERT INTO barang (kd_cucian, id_konsumen, nm_barang, deskripsi) 
    values ('$kd_cucian','$id_konsumen','$nm_barang','$deskripsi')";
     
     $execute = bisa($conn,$query);
     if($execute == 1){
         $success = 'true';
         $title = 'Berhasil';
         $message = 'Berhasil menambahkan data cucian baru';
         $type = 'success';
         header('location: barang-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
     }else{
         echo "Gagal Tambah Data";
     }
 }


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Tambah Cucian</h4>
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
                        <label>Nama barang</label>
                        <input type="text" name="nm_barang" class="form-control">
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