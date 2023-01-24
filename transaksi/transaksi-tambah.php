<?php
$title = 'Transaksi';
require '../functions.php';

date_default_timezone_set("Asia/Jakarta");

$tgl = Date('Y-m-d H:i');

if (isset($_POST['btn-simpan'])) {

    $nm_barang = $_POST['nm_barang'];
    $deskripsi = $_POST['deskripsi'];
    $nm_konsumen = $_POST['nm_konsumen'];
    $no_tlp = $_POST['no_tlp'];
    $tgl    = $_POST['tgl'];
    $id_pengguna = $_POST['id_pengguna'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];

    $sql = ambilsatubaris($conn, "SELECT * FROM layanan WHERE id_layanan= '$layanan'");
    $hrg_layanan = $sql['harga'];
    $total = $berat * $hrg_layanan;

    $query = "INSERT INTO konsumen (nm_konsumen,no_tlp) values ('$nm_konsumen',$no_tlp)";
    $execute = bisa($conn, $query);

    // Tambah data barang
    if ($execute == 1) {
        $id_konsumen = $conn->insert_id;
        $query1 = "INSERT INTO barang (id_konsumen, nm_brg, deskripsi) values ($id_konsumen,'$nm_barang','$deskripsi')";
        $execute = bisa($conn, $query1);

        // Tambah data transaksi
        if ($execute == 1) {
            $kd_barang = $conn->insert_id;
            $query2 = "INSERT INTO transaksi (tgl, id_pengguna, id_konsumen, kd_barang, total) 
            values ('$tgl','$id_pengguna','$id_konsumen','$kd_barang','$total')";
            $execute = bisa($conn, $query2);

            // Tambah detail transaksi
            if ($execute == 1) {
                $no_faktur = $conn->insert_id;
                $kd_barang = $conn->insert_id;
                $query3 = "INSERT INTO detail_transaksi (no_faktur, kd_barang, id_layanan, berat) 
                values ('$no_faktur','$kd_barang','$layanan','$berat')";
                $execute = bisa($conn, $query3);

                if ($execute == 1) {
                    $success = 'true';
                    $title = 'Berhasil';
                    $message = 'Berhasil menambahkan transaksi baru';
                    $type = 'success';
                    header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
                } else {
                    echo "Gagal Tambah Data";
                }
            }
        }
    }
}

require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Tambah Transaksi</h4>
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
                        <label>Tanggal Transaksi</label>
                        <input type="datetime" name="tgl" value="<?= $tgl ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Penjaga Laundry</label>
                        <select name="id_pengguna" class="form-control">
                            <?php
                            $datapengguna = getListPengguna();
                            foreach ($datapengguna as $data) {
                                echo "<option value=\"" . $data["id_pengguna"] . "\">" . $data["nm_pengguna"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" name="nm_konsumen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="no_tlp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <textarea name="nm_barang" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <select name="layanan" class="form-control">
                            <?php
                            $datalayanan = getListLayanan();
                            foreach ($datalayanan as $data) {
                                echo "<option value=\"" . $data["id_layanan"] . "\">" . $data["nm_layanan"] . ' - Rp ' . $data["harga"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" class="form-control">
                        <!-- <?php var_dump($query3)?> -->
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