<?php
define("DEVELOPMENT", TRUE);
session_start();

if ($_SESSION) {
    if ($_SESSION['jabatan'] == 'pemilik') {
    } else {
        header('location:../index.php');
    }
} else {
    header('location:../index.php');
}

function dbConnect()
{
    $db = new mysqli('localhost', 'root', '', 'db_laundry');
    return $db;
}

$conn = dbConnect();

function ambildata($conn, $query)
{
    $data = mysqli_query($conn, $query);
    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }

        return $hasil;
    }
}

function getListPegawai()
{
    $conn = dbConnect();
    if($conn->connect_errno==0){
		$res=$conn->query("SELECT * 
						 FROM pegawai
                         WHERE jabatan = 'penjaga laundry'
						 ORDER BY id_pegawai");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getListKonsumen()
{
    $conn = dbConnect();
    if($conn->connect_errno==0){
		$res=$conn->query("SELECT * 
						 FROM konsumen
                         ORDER BY id_konsumen");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function bisa($conn, $query)
{
    $db = mysqli_query($conn, $query);

    if ($db) {
        return 1;
    } else {
        return 0;
    }
}

function ambilsatubaris($conn, $query)
{
    $db = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($db);
}

function hapus($where, $table, $redirect)
{
    $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    echo $query;
}

function getDataFaktur($nofaktur)
{
$db = dbConnect();
if ($db->connect_errno == 0) {
$res = $db->query("SELECT p.no_faktur, p.tgl, i.id_pegawai, k.id_konsumen, k.no_tlp ,k.nm_konsumen,b.kd_cucian, p.layanan, b.nm_brg, b.deskripsi,
    p.berat, p.total FROM transaksi p JOIN konsumen k ON p.id_konsumen=k.id_konsumen JOIN  barang b ON p.kd_cucian=b.kd_cucian 
    JOIN  pegawai i ON p.id_pegawai=i.id_pegawai
WHERE p.no_faktur='$nofaktur'");
if ($res) {
if ($res->num_rows > 0) {
$data = $res->fetch_assoc();
$res->free();
return $data;
} else
return FALSE;
} else
return FALSE;
} else
return FALSE;
}

