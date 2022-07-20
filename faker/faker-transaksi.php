<?php
# When installed via composer
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	


$dt = $faker->dateTimeBetween($startDate = '-3 years', $interval = '+ 5 days');

$created = $dt-> format("yy-MM-dd HH:mm:ss");



for ($i = 5 ;$i <= 25; $i++){

    $db->query("INSERT INTO `transaksi` (`no_faktur`, `tgl`, `id_pegawai`, `id_konsumen`, `kd_cucian`, `layanan`, `berat`)
    VALUES('$i','{$created}','{P00$i}','{$i}','K00$i', `{$faker->randomElement(['regular', 'one_day'])}',$faker->randomElement(['2', '4', '6']))
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