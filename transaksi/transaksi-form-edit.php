<?php
$title = 'Transaksi';
require '../functions.php';
date_default_timezone_set("Asia/Jakarta");

$penjaga = getListPegawai();

$nofaktur = $_GET['no_faktur'];
$transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi WHERE no_faktur = '$nofaktur'");
$id_konsumen = $transaksi['id_konsumen'];
$kd_cucian = $transaksi['kd_cucian'];

$konsumen = ambilsatubaris($conn, "SELECT * FROM konsumen WHERE id_konsumen = '$id_konsumen'");
$barang = ambilsatubaris($conn, "SELECT * FROM barang WHERE kd_cucian = '$kd_cucian'");

$tgl = Date('Y-m-d H:i');
$layanan = ['regular', 'one_day', 'express'];

if (isset($_POST['btn-simpan'])) {
    if ($_POST['layanan'] == 'regular') {
        $hrg_layanan = 5000;
    } else if ($_POST['layanan'] == 'one_day') {
        $hrg_layanan = 6000;
    } else if ($_POST['layanan'] == 'express') {
        $hrg_layanan = 7000;
    }

    $nm_barang = $_POST['nm_brg'];
    $nm_konsumen = $_POST['nm_konsumen'];
    $no_tlp = $_POST['no_tlp'];
    $tgl = $_POST['tgl'];
    $id_pegawai = $_POST['id_pegawai'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $total = $_POST['berat'] * $hrg_layanan;

    $query = "UPDATE konsumen SET nm_konsumen = '$nm_konsumen', no_tlp = '$no_tlp' WHERE id_konsumen ='$id_konsumen'";
    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $query = "UPDATE barang SET nm_brg = '$nm_barang', deskripsi = '$deskripsi' WHERE kd_cucian ='$kd_cucian'";
        $execute = bisa($conn, $query);
        if ($execute == 1) {
            $query = "UPDATE transaksi SET tgl = '$tgl', id_pegawai = '$id_pegawai', layanan = '$layanan', berat = '$berat', total = '$total' WHERE no_faktur ='$nofaktur'";
            $execute = bisa($conn, $query);
            if ($execute == 1) {
                $success = 'true';
                $title = 'Berhasil';
                $message = 'Berhasil mengubah transaksi';
                $type = 'success';
                header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
            } else {
                echo "Gagal Ubah Data";
            }
        }
    }
}

require "../layout/layout_header.php";
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Ubah Data Transaksi</h4>
        </div>
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
                        <label>Tanggal Transaksi</label>
                        <input type="datetime" name="tgl" value="<?= $tgl ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Penjaga Laundry</label>
                        <select name="id_pegawai" class="form-control">
                            <?php foreach ($penjaga as $p) : ?>
                                <?php if ($p['id_pegawai'] == $transaksi['id_pegawai']) : ?>
                                    <option value="<?= $p['id_pegawai']; ?>" selected><?= $p['nm_pegawai']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_pegawai']; ?>"><?= $p['nm_pegawai']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" name="nm_konsumen" value="<?= $konsumen["nm_konsumen"] ?>" class="form-control" maxlength="30">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="no_tlp" value="<?= $konsumen["no_tlp"] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <textarea name="nm_brg" class="form-control"><?= $barang["nm_brg"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"><?= $barang["deskripsi"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <select name="layanan" class="form-control">
                            <?php foreach ($layanan as $key) : ?>
                                <?php if ($key == $transaksi['layanan']) : ?>
                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                <?php else : ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" value="<?= $transaksi["berat"] ?>" class="form-control">
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