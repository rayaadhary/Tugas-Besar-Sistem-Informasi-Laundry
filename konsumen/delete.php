<?php

require '../functions.php';
$conn =dbConnect();
if($_GET['id_konsumen']!=""){
    $id = $_GET['id_konsumen'];
    $sql= mysqli_query($conn,"DELETE FROM konsumen WHERE id_konsumen='$id'");
    if($sql){
        $_SESSION['info'] = 'Dihapus';
        echo "<script>document.location.href='konsumen-laundry.php'</script>";
    }else{
        $_SESSION['info'] = 'Gagal Dihapus';
         echo "<script>document.location.href='konsumen-laundry.php'</script>";
    }
}
