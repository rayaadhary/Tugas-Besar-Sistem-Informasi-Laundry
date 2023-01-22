<?php

require '../functions.php';

$id=$_GET['id_konsumen'];
$query = "DELETE FROM `konsumen` WHERE id_konsumen=$id ";

if (mysqli_query($conn, $query)) {
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: konsumen-laundry.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}

else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);