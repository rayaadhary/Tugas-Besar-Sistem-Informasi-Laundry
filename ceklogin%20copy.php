<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'db_laundry');

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM pegawai WHERE id_pegawai='$username'";
$row = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($row);

if (isset($_POST["btn_login"])) {
    if ($password == $data['password']) {
        if ($data['jabatan'] == 'Owner') {
            $_SESSION['jabatan'] = 'Owner';
            $_SESSION['nm_pegawai'] = $data['nm_pegawai'];
            header('location:owner');
        }
    } else {
        header('location:index.php?msg=1');
    }
} else {
    header('location:index.php?msg=2');
}
