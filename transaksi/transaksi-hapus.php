<?php
require '../functions.php';

$no_faktur = $_GET['no_faktur'];
$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_faktur='$no_faktur'");
$data = mysqli_fetch_array($query);
$id_konsumen = $data['id_konsumen'];
$kd_barang = $data['kd_barang'];

$query = bisa($conn, "DELETE FROM detail_transaksi WHERE no_faktur = '$no_faktur'");

if ($query == 1) {
    $query0 = bisa($conn, "DELETE FROM transaksi WHERE no_faktur = '$no_faktur'");
    if ($query0 == 1) {
        $query1 = bisa($conn, "DELETE FROM barang WHERE kd_barang = '$kd_barang'");
        if ($query1 == 1) {
            $query2 = bisa($conn, "DELETE FROM konsumen WHERE id_konsumen = '$id_konsumen'");

            $success = 'true';
            $title = 'Berhasil';
            $message = 'Berhasil menghapus transaksi';
            $type = 'success';
            header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
        } else {
            echo "Gagal Hapus Data";
        }
    }
} else {
    echo "Gagal Hapus Data";
}
