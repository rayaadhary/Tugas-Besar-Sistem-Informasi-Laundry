<?php
$title = 'Pengguna-Laundry';
require '../functions.php';
$penjaga = ambildata($conn, 'SELECT * FROM pengguna');
if (isset($_POST['btn-simpan'])) {
    $id_pengguna    = $_POST['id_pengguna'];
    $nama          = $_POST['nm_pengguna'];
    $telp          = $_POST['no_tlp'];
    $jabatan       = $_POST['jabatan'];

    $query = "INSERT INTO pengguna (id_pengguna,nm_pengguna,no_tlp,jabatan) 
    values ('$id_pegawai','$nama','$telp','$jabatan')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan ' . $jabatan . ' baru';
        $type = 'success';
        header('location: penjaga-laundry.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Tambah Penjaga Laundry</h4>
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
                        <label>ID</label>
                        <input type="text" name="id_pengguna" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Penjaga Laundry</label>
                        <input type="text" name="nm_pengguna" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_tlp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control">
                            <option value="pemilik">pemilik</option>
                            <option value="penjaga laundry">penjaga laundry</option>
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