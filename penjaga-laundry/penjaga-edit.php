<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data Produk</title>
</head>

<body>
    <?php banner(); ?>
    <?php navigator(); ?>

    <h1>Pembaruan Data Produk</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $IdProduk  = $db->escape_string($_POST["IdProduk"]);
            $Nama       = $db->escape_string($_POST["Nama"]);
            $IdKategori = $db->escape_string($_POST["IdKategori"]);
            $Skala       = $db->escape_string($_POST["Skala"]);
            // Susun query update
            $sql = "UPDATE produk SET 
			  Nama='$Nama',IdKategori='$IdKategori',Skala='$Skala',
			  Pemasok='$Pemasok',Deskripsi='$Deskripsi',Stok='$Stok',
			  HargaBeli='$HargaBeli',HargaJual='$HargaJual',
			  IdPegawai='" . $db->escape_string($_SESSION["IdPegawai"]) . "'
			  WHERE id_pegawai='$id_pegawai'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
                    Data berhasil diupdate.<br>
                    <a href="produk.php"><button>View Produk</button></a>
                <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
                    Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
                    <a href="javascript:history.back()"><button>Edit Kembali</button></a>
                    <a href="produk.php"><button>View Produk</button></a>
                <?php
                }
            } else { // gagal query
                ?>
                Data gagal diupdate.
                <a href="javascript:history.back()"><button>Edit Kembali</button></a>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>