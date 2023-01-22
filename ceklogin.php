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
        if ($data['jabatan'] == 'pemilik' || $data['jabatan'] == 'penjaga laundry') {
            $_SESSION['jabatan'] = 'pemilik';
            $_SESSION['nm_pegawai'] = $data['nm_pegawai'];
            header('location:pemilik');
            //jika rememberme di klik
		if(!empty($_POST["remember"])) {
			//buat cookie
			setcookie ("username",$_POST["username"],time()+ (3600 * 365 * 24 * 60 * 60));
			setcookie ("password",$_POST["password"],time()+ (3600 * 365 * 24 * 60 * 60));
		}else{
		if(isset($_COOKIE["username"])) {
			setcookie ("username","");
		  }
		  if(isset($_COOKIE["password"])) {
			setcookie ("password","");
		  }
		}
        }
    } else {
        header('location:index.php?msg=1');
    }
} else {
    header('location:index.php?msg=2');
}
