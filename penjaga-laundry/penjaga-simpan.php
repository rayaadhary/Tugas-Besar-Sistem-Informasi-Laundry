<?php
$title = 'Penjaga-Laundry';
require '../functions.php';
// $outlet = ambildata($conn,'SELECT * FROM outlet');
// if(isset($_POST['btn-simpan'])){
//     $nama     = $_POST['nama_user'];
//     $username = $_POST['username'];
//     $pass     = md5($_POST['password']);
//     $role     = $_POST['role'];
//     if($role == 'kasir'){
//         $outlet_id = $_POST['outlet_id'];
//         $query = "INSERT INTO user (nama_user,username,password,role,outlet_id) values ('$nama','$username','$pass','$role','$outlet_id')";
//     }else{
//         $query = "INSERT INTO user (nama_user,username,password,role) values ('$nama','$username','$pass','$role')";

//     }
//     $execute = bisa($conn,$query);
//     if($execute == 1){
//         $success = 'true';
//         $title = 'Berhasil';
//         $message = 'Berhasil menambahkan ' .$role. ' baru';
//         $type = 'success';
//         header('location: pengguna.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
//     }else{
//         echo "Gagal Tambah Data";
//     }
// }


require '../layout/layout_header.php';
?>
<h3>Penyimpanan Data Barang</h3>
<hr class="bg-secondary">
<?php
if (isset($_POST["btnsimpan"])) {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        // Bersihkan data
        $id_barang       = $db->escape_string($_POST["id_barang"]);
        $nama_barang     = $db->escape_string($_POST["nama_barang"]);
        $id_jenis         = $db->escape_string($_POST["id_jenis"]);
        $harga             = $db->escape_string($_POST["harga"]);
        $stok               = $db->escape_string($_POST["stok"]);

        // validasi
        $pesansalah = "";

        // validasi id_barang	
        $id_barang = trim($id_barang);

        $idBarangAngka = substr($id_barang, 1, 4);
        $idBarangAwal = substr($id_barang, 0, 1);


        $query = $db->query("SELECT id_barang FROM barang WHERE id_barang = '$id_barang'");

        if ($query->num_rows > 0)
            $pesansalah .= "Id Barang sudah ada.<br>";

        if (strlen($id_barang) == 0)
            $pesansalah .= "Id Barang tidak sah. Id Barang tidak boleh kosong.<br>";

        if ($idBarangAwal != "B")
            $pesansalah .= "Input Pertama harus huruf B 
		untuk Id Barang.<br>";

        if (!is_numeric($idBarangAngka))
            $pesansalah .= "Id Barang tidak sah. Penulisan Id Barang setelah B harus berupa angka 4 digit.<br>";

        if (strlen($idBarangAngka) < 4)
            $pesansalah .= "Format Id Barang tidak sesuai, Id Barang diawali dengan B dan 
		setelahnya harus berupa 4 digit angka.<br>";

        // validasi nama
        $nama_barang = trim($nama_barang);
        if (strlen($nama_barang) == 0)
            $pesansalah .= "Nama Barang tidak sah. Nama Barang tidak boleh kosong.<br>";

        // validasi id_jenis
        if ($id_jenis == 0) {
            $pesansalah .= "Jenis Barang tidak sah. Jenis Barang tidak boleh kosong.<br>";
        }
        // validasi harga barang
        $harga = trim($harga);
        if (!is_numeric($harga))
            $pesansalah .= "Harga harus berformat angka.<br>";

        // validasi stok
        $stok = trim($stok);
        if (!is_numeric($stok))
            $pesansalah .= "Stok harus berformat angka.<br>";

        if ($pesansalah == "") {
?>
            <div class="alert alert-primary" role="alert">
                Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database
            </div>
            <?php
            // script database
            // Susun query insert
            $sql = "INSERT INTO barang(id_barang,nama_barang,id_jenis,harga,stok,id_pegawai)
			  VALUES('$id_barang','$nama_barang','$id_jenis','$harga','$stok',
				'" . $db->escape_string($_SESSION["id_pegawai"]) . "')";
            // Eksekusi query insert
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada penambahan data
            ?>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            Data berhasil disimpan.
                        </div>
                    </div>
                    <br>
                    <a href="barang.php" class="btn btn-dark">Tampil Barang</a>
                <?php
                }
            } else {
                ?>
                Data gagal disimpan karena Id Barang mungkin sudah ada.<br>
                <a href=javascript:history.back(); class="btn btn-dark">Kembali</a>
            <?php
            }
        } else {
            ?>
            <div class="d-flex justify-content-center">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title fs-5">Terjadi kesalahan sebagai berikut</h5>
                        <p class="card-text"><?= $pesansalah; ?></p>
                        <a href=javascript:history.back(); class="btn btn-primary">Kembali Ke Form</a>
                    </div>
                </div>
            </div>
<?php
        }
    } else
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
?>
</div>
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah yakin ingin keluar?
            </div>
            <div class="modal-footer">
                <form method="post" action="../../logout.php">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="TblKeluar" class="btn btn-danger">Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../layout/layout_footer.php';
?>