<?php
$title = 'Konsumen';
require '../functions.php';
require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Konsumen Laundry</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="konsumen-tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                </div>
                <?php
                if ($conn->connect_errno == 0) {
                    $sql = "SELECT id_konsumen, nm_konsumen, no_tlp FROM konsumen";
                    $res = $conn->query($sql);
                    if ($res) {
                ?>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>

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
                                            <td><?= $row['id_konsumen']; ?></td>
                                            <td><?= $row['nm_konsumen']; ?></td>
                                            <td><?= $row['no_tlp']; ?></td>

                                            <td>
                                                <!-- a href -->
                                                <a href="#" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <!-- a href -->
                                                <a href="#" class="btn btn-danger btn-circle btn-sm">
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
</div>
<?php
require '../layout/layout_footer.php';
?>