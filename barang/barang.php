<?php
session_start();
$title = 'Barang';
require '../functions.php';
require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Barang Laundry</h4>
        </div>
    </div>
    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']); ?>"></div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <form method="post" action="">
                    <?php
                    if ($conn->connect_errno == 0) {
                        $sql = "SELECT * FROM barang";
                        $res = $conn->query($sql);
                        if ($res) {
                    ?>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Cucian</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = $res->fetch_all(MYSQLI_ASSOC);
                                        foreach ($data as $row) {
                                        ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $row['kd_barang']; ?></td>
                                                <td><?= $row['nm_brg']; ?></td>
                                                <td><?= $row['deskripsi']; ?></td>
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
            </form>
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