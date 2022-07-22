<?php
# When installed via composer
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	


$dt = $faker->dateTimeBetween($startDate = '-3 years', $interval = '+ 5 days');

$created = $dt-> format("yy-MM-dd HH:mm:ss");



for ($i = 1 ;$i <= 100; $i++){
      $db->query("INSERT INTO konsumen (nm_konsumen,no_tlp) values ('$faker->name','$faker->phonenumber')");
       $res = $db;
        // $execute = bisa($conn,$query);

   if ($res)
   {
        $id_konsumen = $db->insert_id;
        $db->query ("INSERT INTO barang (id_konsumen, nm_brg, deskripsi) values ($id_konsumen,'{$faker->randomElement(['baju putih','baju merah','baju merah'])}','{$faker->text}')");
         $res = $db;
        // $execute = bisa($conn,$query);
        
         if($res)
         {    
            $kd_cucian = $db->insert_id;
            $db->query("INSERT INTO transaksi (tgl, id_pegawai, id_konsumen, kd_cucian, layanan, berat, total) 
            values ('$created','P00$i','$id_konsumen','$kd_cucian', '{$faker->randomElement(['regular', 'one_day' ,'express'])}', '$i', '$i')");
           $res = $db;
          //  $execute = bisa($conn,$query);
         }
    }
  }
   
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