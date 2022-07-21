<?php

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