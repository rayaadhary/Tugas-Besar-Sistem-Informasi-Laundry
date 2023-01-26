<?php
session_start();
require '../functions.php';

$id=$_GET['id_laporan'];
$query = "DELETE FROM laporan WHERE id_laporan='$id'";

if (mysqli_query($conn, $query)) {
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: laporan.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}

else {
    echo "Gagal hapus data: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


