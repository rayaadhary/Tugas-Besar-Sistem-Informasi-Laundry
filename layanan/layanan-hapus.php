<?php
session_start();
require '../functions.php';

$id_layanan=$_GET['id_layanan'];
$query = "DELETE FROM layanan WHERE id_layanan='$id_layanan'";

if (mysqli_query($conn, $query)) {
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: layanan.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}

else {
    echo "Gagal hapus data: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


