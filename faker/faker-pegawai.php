<?php
# When installed via composer
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	
for ($i = 1 ;$i <= 10; $i++){

    $db->query("INSERT INTO pegawai(`id_pegawai`, `nm_pegawai`, `no_tlp`, `jabatan`, `password`)
    VALUES('P00$i','{$faker->name}','{$faker->phoneNumber}','{$faker->randomElement(['pemilik', 'penjaga laundry'])}','P00$i')
    ");
    }; 

    // Eksekusi query insert
$res = $db;
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