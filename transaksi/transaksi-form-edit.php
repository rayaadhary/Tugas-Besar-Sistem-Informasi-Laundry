<?php
$title = 'Transaksi';
require '../functions.php';
date_default_timezone_set("Asia/Jakarta");

$penjaga = getListPengguna();
$datalayanan = getListLayanan();
$nofaktur = $_GET['no_faktur'];
$transaksi = ambilsatubaris($conn, "SELECT * FROM transaksi WHERE no_faktur = '$nofaktur'");
$id_konsumen = $transaksi['id_konsumen'];
$kd_barang = $transaksi['kd_barang'];
$detail_transaksi = ambilsatubaris($conn, "SELECT * FROM detail_transaksi WHERE no_faktur = '$nofaktur'");
$konsumen = ambilsatubaris($conn, "SELECT * FROM konsumen WHERE id_konsumen = '$id_konsumen'");
$barang = ambilsatubaris($conn, "SELECT * FROM barang WHERE kd_barang = '$kd_barang'");

$tgl = Date('Y-m-d H:i');

if (isset($_POST['btn-simpan'])) {
    $nm_barang = $_POST['nm_brg'];
    $nm_konsumen = $_POST['nm_konsumen'];
    $no_tlp = $_POST['no_tlp'];
    $tgl = $_POST['tgl'];
    $id_pengguna = $_POST['id_pengguna'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $sql = ambilsatubaris($conn, "SELECT * FROM layanan WHERE id_layanan= '$layanan'");
    $hrg_layanan = $sql['harga'];
    $total = $berat * $hrg_layanan;

    $query = "UPDATE konsumen SET nm_konsumen = '$nm_konsumen', no_tlp = '$no_tlp' WHERE id_konsumen ='$id_konsumen'";
    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $query = "UPDATE barang SET nm_brg = '$nm_barang', deskripsi = '$deskripsi' WHERE kd_barang ='$kd_barang'";
        $execute = bisa($conn, $query);
        if ($execute == 1) {
            $query = "UPDATE transaksi SET tgl = '$tgl', id_pengguna = '$id_pengguna', total = '$total' WHERE no_faktur ='$nofaktur'";
            $execute = bisa($conn, $query);
            if ($execute == 1) {
                $query = "UPDATE detail_transaksi SET id_layanan = '$layanan', berat = '$berat' WHERE no_faktur ='$nofaktur'";
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
                        <select name="id_pengguna" class="form-control">
                            <?php foreach ($penjaga as $p) : ?>
                                <?php if ($p['id_pengguna'] == $transaksi['id_pengguna']) : ?>
                                    <option value="<?= $p['id_pengguna']; ?>" selected><?= $p['nm_pengguna']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_pengguna']; ?>"><?= $p['nm_pengguna']; ?></option>
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
                        <select name="layanan" id="layanan" class="form-control">
                            <?php foreach ($datalayanan as $key) : ?>
                                <?php if ($key['id_layanan'] == $detail_transaksi['id_layanan']) : ?>
                                    <option value="<?= $key['id_layanan'] ?>" selected><?= $key['nm_layanan'] ?> - Rp <?= $key['harga'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $key['id_layanan'] ?>"><?= $key['nm_layanan'] ?>- Rp <?= $key['harga'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" value="<?= $detail_transaksi["berat"] ?>" class="form-control">
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