<?php
session_start();
$title = 'Transaksi';
require '../functions.php';
require '../layout/layout_header.php';

$data = mysqli_query($conn, "SELECT * FROM transaksi
                        JOIN pengguna ON `transaksi`.`id_pengguna` = `pengguna`.`id_pengguna`
                        JOIN konsumen ON `transaksi`.`id_konsumen` = `konsumen`.`id_konsumen`");

$i = 1;
?>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?= $title ?></h4>
        </div>
    </div>

    <?php if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if ($msg == 1) {
    ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil ditambahkan!</div>
        <?php
        } else if ($msg == 2) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil diubah!</div>
        <?php
        } else if ($msg == 3) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil dihapus!</div>
        <?php
        } else if ($msg == 4) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal tambah data!</div>
        <?php
        } else if ($msg == 5) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal hapus data!</div>
    <?php
        }
    }
    ?>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi-tambah.php" class="btn btn-primary box-title" title="Tambah Data"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table thead-dark" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Faktur</th>
                                <th>Tanggal</th>
                                <th>Pegawai</th>
                                <th>Konsumen</th>
                                <th>Kode Barang</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $transaksi['no_faktur']; ?></td>
                                    <td><?= $transaksi['tgl']; ?></td>
                                    <td><?= $transaksi['nm_pengguna']; ?></td>
                                    <td><?= $transaksi['nm_konsumen']; ?></td>
                                    <td><?= $transaksi['kd_barang']; ?></td>
                                    <td>Rp <?= number_format($transaksi['total'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php
                                        if ($transaksi['lunas'] == 'Y') {
                                            echo 'Lunas';
                                        } else {
                                            echo 'Belum Lunas';
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <a href="transaksi-form-edit.php?no_faktur=<?= $transaksi['no_faktur']; ?>" class="btn btn-success btn-sm " title="Ubah">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="transaksi-hapus.php?no_faktur=<?= $transaksi['no_faktur']; ?>" class="btn btn-danger btn-sm delete-data">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="cetak-transaksi.php?no_faktur=<?= $transaksi['no_faktur']; ?>" class="btn btn-info btn-sm">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../assets/js/js-hapus.js"></script>
    <script src="../assets/js/js-logout.js"></script>
</div>

<?php
require '../layout/layout_footer.php';
?>