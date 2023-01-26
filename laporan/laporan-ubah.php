<?php
session_start();
$title = 'Laporan';
require '../functions.php';


$id = $_GET['id_laporan'];
$laporan = ambilsatubaris($conn, "SELECT * FROM laporan WHERE id_laporan='$id'");
$tgl = Date('Y-m-d h:i:s');
$transaksi = ambildata($conn, "SELECT * FROM transaksi");

if (isset($_POST['btn-simpan'])) {
    if ($db->errno == 0) {
        $id_laporan = $_POST['id_laporan'];
        $tgl = $_POST['tgl'];
        $no_faktur = $_POST['no_faktur'];
        $total = $_POST['total'];

        $query = "UPDATE laporan SET tgl='$tgl', no_faktur='$no_faktur', total='$total' 
                    WHERE id_laporan='$id'";

        $execute = bisa($conn, $query);
        if ($execute == 1) {
            $success = 'true';
            $title = 'Berhasil';
            $message = 'Berhasil mengubah laporan';
            $type = 'info';
            header('location: laporan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
        } else {
            echo "Gagal Ubah Data";
        }
    } else {
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
}

require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <h4 class="page-title">Ubah Laporan Transaksi Laundry</h4>
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
                        <select name="no_faktur" class="form-control">
                            <?php foreach ($transaksi as $t) : ?>
                                <?php if ($t['no_faktur'] == $laporan['no_faktur']) : ?>
                                    <option value="<?= $t['no_faktur']; ?>" selected><?= $t['no_faktur']; ?></option>
                                <?php else : ?>
                                    <!-- <?php $transaksi2 = ambildata($conn, "SELECT * FROM transaksi WHERE no_faktur NOT IN (SELECT no_faktur FROM laporan)"); ?>
                                    <?php foreach ($transaksi2 as $t2) : ?>
                                        <option value="<?= $t2['no_faktur']; ?>"><?= $t2['no_faktur']; ?></option>
                                    <?php endforeach; ?> -->
                                    <option value="<?= $t['no_faktur']; ?>"><?= $t['no_faktur']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <select name="total" class="form-control">
                            <?php foreach ($transaksi as $t) : ?>
                                <?php if ($t['total'] == $laporan['total']) : ?>
                                    <option value="<?= $t['total']; ?>" selected>Rp <?= $t['total']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $t['total']; ?>">Rp <?= $t['total']; ?></option>
                                <?php endif; ?>
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