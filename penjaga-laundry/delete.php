<?php

require '../functions.php';
$conn =dbConnect();
if($_GET['id_pegawai']!=""){
    $id = $_GET['id_pegawai'];
    $sql= mysqli_query($conn,"DELETE FROM pegawai WHERE id_pegawai='$id'");
    if($sql){
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='penjaga-laundry.php'</script>";
    }else{
        $_SESSION['info'] = 'Gagal Dihapus';
        echo "<script>document.location.href='penjaga-laundry.php'</script>";
    }
}