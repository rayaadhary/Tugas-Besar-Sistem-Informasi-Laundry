<?php
<<<<<<< HEAD

require '../functions.php';

$id=$_GET['id'];
$query = "DELETE FROM transaksi WHERE no_faktur='$id'";

if (mysqli_query($conn, $query)) {
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: transaksi.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}

else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn); 
=======
require '../functions.php';

$no_faktur = $_GET['no_faktur'];
$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_faktur='$no_faktur'");
$data = mysqli_fetch_array($query);
$id_konsumen = $data['id_konsumen'];
$kd_cucian = $data['kd_cucian'];

$query = bisa($conn, "DELETE FROM transaksi WHERE no_faktur ='$no_faktur'");

if ($query == 1) {
    $query1 = bisa($conn, "DELETE FROM barang WHERE kd_cucian ='$kd_cucian'");
    if ($query1 == 1) {
        $query2 = bisa($conn, "DELETE FROM konsumen WHERE id_konsumen ='$id_konsumen'");
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menghapus transaksi';
        $type = 'success';
        header('location: transaksi.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
       echo "Gagal Hapus Data";
    }
} else {
    echo "Gagal Hapus Data";
}
>>>>>>> c5bb42fddcdcca24ba2ce6dc0a76c2e6a7241251
