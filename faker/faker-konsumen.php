<?php
# When installed via composer
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create("id_ID");

$db=new mysqli("localhost","root","","db_laundry");// Sesuaikan dengan konfigurasi server anda.
	
for ($i = 5 ;$i <= 25; $i++){

    $db=("INSERT INTO konsumen(id_konsumen,nm_konsumen,no_tlp)
    VALUES('$i','{$faker->name}','{$faker->phoneNumber}')
    ");
   
    
    }; 
    
    