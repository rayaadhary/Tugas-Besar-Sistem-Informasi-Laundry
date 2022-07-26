<?php
$title = 'Transaksi';
require '../functions.php';

date_default_timezone_set("Asia/Jakarta");

$tgl = Date('Y-m-d H:i');

if(isset($_POST['btn-simpan'])){

    $nm_barang = $_POST['nm_barang'];
    $deskripsi = $_POST['deskripsi'];

    $nm_konsumen = $_POST['nm_konsumen'];
    $no_tlp = $_POST['no_tlp'];
    

    $tgl    = $_POST['tgl'];
     $id_pegawai = $_POST['id_pegawai'];
     $layanan = $_POST['layanan'];
     $berat = $_POST['berat'];
    
     if ($_POST['layanan'] == 'regular') {
        $hrg_layanan = 5000;
    } else if ($_POST['layanan'] == 'one_day') {
        $hrg_layanan = 6000;
    } else if ($_POST['layanan'] == 'express') {
        $hrg_layanan = 7000;
    }

    $total = $_POST['berat'] * $hrg_layanan;


     $query = "INSERT INTO konsumen (nm_konsumen,no_tlp) values ('$nm_konsumen',$no_tlp)";
    //   $res = $conn->query($query);
        $execute = bisa($conn,$query);

   if ($execute == 1)
   {
        $id_konsumen = $conn->insert_id;
        $query = "INSERT INTO barang (id_konsumen, nm_brg, deskripsi) values ($id_konsumen,'$nm_barang','$deskripsi')";
        // $res = $db->query($query);
        $execute = bisa($conn,$query);
        
         if($execute == 1)
         {    
            $kd_cucian = $conn->insert_id;
            $query = "INSERT INTO transaksi (tgl, id_pegawai, id_konsumen, kd_cucian, layanan, berat, total) 
            values ('$tgl','$id_pegawai','$id_konsumen','$kd_cucian', '$layanan', '$berat', '$total')";
            $execute = bisa($conn,$query);
            
       if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan transaksi baru';
        $type = 'success';
        header('location: transaksi.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
    
    }
        
   }
 }


require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Tambah Transaksi</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="datetime" name="tgl" value="<?= $tgl ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Penjaga Laundry</label>
                        <select name="id_pegawai" class="form-control">
                        <?php
                                $datapegawai=getListPegawai();
                                foreach($datapegawai as $data){
                                    echo "<option value=\"".$data["id_pegawai"]."\">".$data["nm_pegawai"]."</option>";
                                }
                            ?>                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" name="nm_konsumen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="no_tlp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <textarea name="nm_barang" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <select name="layanan" class="form-control">
                            <option value="regular">regular</option>
                            <option value="one_day">one day</option>
                            <option value="express">express</option>
                        </select>
                    </div>                     
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../layout/layout_footer.php';
?>