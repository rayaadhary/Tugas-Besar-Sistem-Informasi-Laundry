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

function getListPengguna()
{
	$conn = dbConnect();
	if ($conn->connect_errno == 0) {
		$res = $conn->query("SELECT * 
						 FROM pengguna
                         WHERE jabatan = 'penjaga laundry'
						 ORDER BY id_pengguna");
		if ($res) {
			$data = $res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		} else
			return FALSE;
	} else
		return FALSE;
}

function getListKonsumen()
{
	$conn = dbConnect();
	if ($conn->connect_errno == 0) {
		$res = $conn->query("SELECT * 
						 FROM konsumen
                         ORDER BY id_konsumen");
		if ($res) {
			$data = $res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		} else
			return FALSE;
	} else
		return FALSE;
}

function getListLayanan()
{
	$conn = dbConnect();
	if ($conn->connect_errno == 0) {
		$res = $conn->query("SELECT * 
						 FROM layanan
                         ORDER BY id_layanan");
		if ($res) {
			$data = $res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		} else
			return FALSE;
	} else
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
