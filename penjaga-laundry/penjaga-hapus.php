<<<<<<< HEAD
<?php

require '../functions.php';

$id=$_GET['id_pegawai'];
$query = "DELETE FROM pegawai WHERE id_pegawai='$id'";

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


=======
<?php

require '../functions.php';

$id=$_GET['id_pegawai'];
$query = "DELETE FROM pegawai WHERE id_pegawai='$id'";

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


>>>>>>> c5bb42fddcdcca24ba2ce6dc0a76c2e6a7241251
