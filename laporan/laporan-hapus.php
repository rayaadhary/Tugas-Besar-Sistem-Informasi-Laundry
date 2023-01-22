<?php

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
<<<<<<< HEAD
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
=======
    echo "Gagal hapus data: " . $query . "<br>" . mysqli_error($conn);
>>>>>>> c5bb42fddcdcca24ba2ce6dc0a76c2e6a7241251
}
mysqli_close($conn);


