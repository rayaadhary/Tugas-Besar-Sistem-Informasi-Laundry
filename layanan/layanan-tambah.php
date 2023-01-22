<?php
$title = 'Layanan';
require '../functions.php';

$db = dbConnect();

$transaksi = ambildata($conn, "SELECT * FROM layanan");

if (isset($_POST['btn-simpan'])) {
    if ($db->errno == 0) {     
        $id_layanan = $_POST['id_layanan'];
        $nm_layanan = $_POST['nm_layanan'];
        $harga = $_POST['harga'];

        $query = "INSERT INTO layanan (id_layanan,nm_layanan,harga) VALUES ('$id_layanan','$nm_layanan','$harga')";

        $execute = bisa($conn, $query);
        if ($execute == 1) {
              $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambah Layanan';
        $type = 'success';
        header('location: layanan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
        } else {
            echo "Gagal Tambah Data";
        }
    } else {
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
}

require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <h4 class="page-title">Tambah Layanan Transaksi Laundry</h4>
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
                        <label>ID Layanan</label>
                        <input type="text" name="id_layanan" class="form-control">
                    </div>
                <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="nm_layanan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
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