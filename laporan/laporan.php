<?php
session_start();
$title = 'Laporan';
require '../functions.php';
require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">laporan Transaksi Laundry</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="laporan-tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                </div>
                <?php
                if ($conn->connect_errno == 0) {
                    $sql = "SELECT * FROM laporan";
                    $res = $conn->query($sql);
                    if ($res) {
                ?>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>No. Faktur</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $res->fetch_all(MYSQLI_ASSOC);
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $row['id_laporan']; ?></td>
                                            <td><?= $row['tgl']; ?></td>
                                            <td><?= $row['no_faktur']; ?></td>
                                            <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
                                            <td>
                                                <!-- a href -->
                                                <a href="laporan-ubah.php?id_laporan=<?php echo $row["id_laporan"]; ?>" class="btn btn-success btn-sm" title="Ubah">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <!-- a href -->
                                                <a href="laporan-hapus.php?id_laporan=<?php echo $row["id_laporan"]; ?>" class="btn btn-danger btn-sm delete-data">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                    <?php
                        $res->free();
                    } else
                        echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $conn->error : "") . "<br>";
                } else
                    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $conn->connect_error : "") . "<br>";
                    ?>
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
</div>
<?php
require '../layout/layout_footer.php';
?>