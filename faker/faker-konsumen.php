<?php
# When installed via composer
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	
for ($i = 1 ;$i <= 25; $i++){

    $query="INSERT INTO konsumen(nm_konsumen,no_tlp)
    VALUES('{$faker->name}','{$faker->phoneNumber}')";
   
    
    }; 

        // Eksekusi query insert
$res = mysqli_query($db, $query);
if ($res) {
if ($db->affected_rows > 0) { // jika ada penambahan data
?>

Data berhasil disimpan.<br>

<?php
}
} else {
?>
Data gagal disimpan karena IdPasien mungkin sudah ada.<br>

<?php
}

?>
    