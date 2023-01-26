<?php
session_start();
require '../functions.php';

$id = $_GET['id_pengguna'];
$query = "DELETE FROM pengguna WHERE id_pengguna='$id'";

if (mysqli_query($conn, $query)) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'warning';
    header('location: pengguna.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
