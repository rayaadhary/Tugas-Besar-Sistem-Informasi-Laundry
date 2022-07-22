<?php
require '../functions.php';

// if (mysqli_query($conn, $query)) {
// 	$success = 'true';
//     $title = 'Berhasil';
//     $message = 'Menghapus Data';
//     $type = 'success';
//     header('location: transaksi.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
// }

// else {
//     echo "Error: " . $query . "<br>" . mysqli_error($conn);
// // }
// mysqli_close($conn); 



if (isset($_GET["no_faktur"])) {
    $nofaktur = $conn->escape_string($_GET["no_faktur"]);
    if ($faktur = getDataFaktur($nofaktur)) {

          
    $query = "DELETE FROM konsumen WHERE id_konsumen ='$id_konsumen'";
    //   $res = $conn->query($query);
        $execute = bisa($conn,$query);

   if ($execute == 1)
   {
        // $id_konsumen = $conn->insert_id;
        $query = "DELETE FROM barang WHERE kd_cucian ='$kd_cucian'";
        // $res = $db->query($query);
        $execute = bisa($conn,$query);
        
         if($execute == 1)
         {    
            $query = "DELETE FROM transaksi WHERE no_faktur ='$nofaktur'";
            $execute = bisa($conn,$query);
            
       if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menghapus transaksi';
        $type = 'success';
        header('location: transaksi.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
    
    }
        
   }
  
    }
}
    