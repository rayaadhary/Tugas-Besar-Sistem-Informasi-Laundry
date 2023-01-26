<?php
session_start();
$title = 'Laporan';
require '../functions.php';

$db = dbConnect();
date_default_timezone_set("Asia/Jakarta");
$tgl = Date('Y-m-d H:i');
$transaksi = ambildata($conn, "SELECT * FROM transaksi WHERE no_faktur NOT IN (SELECT no_faktur FROM laporan)");

if (isset($_POST['btn-simpan'])) {
    if ($db->errno == 0) {
        $tgl = $_POST['tgl'];
        $no_faktur = $_POST['no_faktur'];
        $total = $_POST['total'];

        $query = "INSERT INTO laporan (tgl,no_faktur,total) VALUES ('$tgl','$no_faktur','$total')";

        $execute = bisa($conn, $query);
        if ($execute == 1) {
            $success = 'true';
            $title = 'Berhasil';
            $message = 'Berhasil menambah laporan';
            $type = 'success';
            header('location: laporan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
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
        <h4 class="page-title">Tambah Laporan Transaksi Laundry</h4>
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
                        <label>Tanggal</label>
                        <input type="datetime" name="tgl" class="form-control" value="<?= $tgl; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>No. Faktur</label>
                        <select id="no_faktur" name="no_faktur" class="form-control" required oninvalid="this.setCustomValidity('Silahkan pilih no. faktur')" oninput="setCustomValidity('')">
                            <option value="">Pilih No. Faktur</option>
                            <?php foreach ($transaksi as $t) : ?>
                                <option value="<?= $t['no_faktur']; ?>"><?= $t['no_faktur']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <select id="total" name="total" class="form-control">
                            <option value=""></option>
                            <?php foreach ($transaksi as $t) : ?>
                                <option value="<?= $t['total']; ?>">Rp <?= $t['total']; ?></option>
                            <?php endforeach; ?>
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