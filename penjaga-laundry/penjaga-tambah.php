<?php
$title = 'Penjaga-Laundry';
require'functions.php';
// $outlet = ambildata($conn,'SELECT * FROM outlet');
// if(isset($_POST['btn-simpan'])){
//     $nama     = $_POST['nama_user'];
//     $username = $_POST['username'];
//     $pass     = md5($_POST['password']);
//     $role     = $_POST['role'];
//     if($role == 'kasir'){
//         $outlet_id = $_POST['outlet_id'];
//         $query = "INSERT INTO user (nama_user,username,password,role,outlet_id) values ('$nama','$username','$pass','$role','$outlet_id')";
//     }else{
//         $query = "INSERT INTO user (nama_user,username,password,role) values ('$nama','$username','$pass','$role')";
    
//     }
//     $execute = bisa($conn,$query);
//     if($execute == 1){
//         $success = 'true';
//         $title = 'Berhasil';
//         $message = 'Berhasil menambahkan ' .$role. ' baru';
//         $type = 'success';
//         header('location: pengguna.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
//     }else{
//         echo "Gagal Tambah Data";
//     }
// }


require'layout_header.php';
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Tambah Penjaga Laundry</h4> </div>
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
                    <label>ID</label>
                    <input type="text" name="id_pegawai" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Penjaga Laundry</label>
                    <input type="text" name="nm_pegawai" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_tlp" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="owner">Owner</option>
                        <option value="staff">Staff</option>
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
require'layout_footer.php';
?> 