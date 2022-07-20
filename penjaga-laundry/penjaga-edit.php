<?php
$title = 'Penjaga-Laundry';
require'functions.php';

// $role = ['admin','owner','kasir'];

// $id_user = $_GET['id'];
// $queryedit = "SELECT * FROM user WHERE id_user = '$id_user'";
// $edit = ambilsatubaris($conn,$queryedit);

// if(isset($_POST['btn-simpan'])){
//     $nama     = $_POST['nama_user'];
//     $username = $_POST['username'];
//     $role     = $_POST['role'];
//     if($_POST['password'] != null || $_POST['password'] == ''){
//         $pass     = md5($_POST['password']);
//         $query = "UPDATE user SET nama_user = '$nama' , username = '$username' , role = '$role' , password ='$pass' WHERE id_user = '$id_user'";    
//     }else{
//         $query = "UPDATE user SET nama_user = '$nama' , username = '$username' , role = '$role' WHERE id_user = '$id_user'";
//     }
    
    
//     $execute = bisa($conn,$query);
//     if($execute == 1){
//         $success = 'true';
//         $title = 'Berhasil';
//         $message = 'Berhasil mengubah ' .$role;
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
            <h4 class="page-title">Ubah Data Penjaga Laundry</h4> </div>
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
                        <?php foreach ($jabatan as $key): ?>
                            <?php if ($key == $edit['jabatan']): ?>
                            <option value="<?= $key ?>" selected><?= $key ?></option>    
                            <?php endif ?>
                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                        <?php endforeach ?>
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