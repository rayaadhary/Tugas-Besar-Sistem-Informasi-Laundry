<?php

require '../functions.php';

$id=$_GET['id_pengguna'];
$query = "DELETE FROM pengguna WHERE id_pengguna='$id'";

if (mysqli_query($conn, $query)) {
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: penjaga-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
