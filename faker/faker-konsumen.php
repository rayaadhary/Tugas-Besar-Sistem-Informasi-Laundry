<?php
# When installed via composer
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	
for ($i = 1; $i <= 25; $i++){
    $query="INSERT INTO pengguna VALUES($i,'{$faker->name}','{$faker->phoneNumber}', '{$faker->randomElement(['pemilik', 'penjaga laundry'])}', 'admin')";
    $res = mysqli_query($db, $query);
}
        // Eksekusi query insert

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
    