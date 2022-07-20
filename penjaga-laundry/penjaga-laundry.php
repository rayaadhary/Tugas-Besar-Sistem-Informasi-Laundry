<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$title = 'Penjaga-Laundry';
require 'functions.php';
require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Penjaga Laundry</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
            <div class="row">
                    <div class="col-md-6">
                        <a href="penjaga-tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>  
            </div>
                <?php
                            if($conn->connect_errno==0){
                            $sql="SELECT id_pegawai, nm_pegawai, no_tlp, jabatan FROM pegawai";
                            $res=$conn->query($sql);
                            if($res){
                ?>
                <div class="table-responsive">
                    <table class="table"  id="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php
                                        $data = $res->fetch_all(MYSQLI_ASSOC);
                                        foreach($data as $row){
                            ?>
                            <tr>
                                <td></td>
                                <td><?= $row['id_pegawai']; ?></td>
                                <td><?= $row['nm_pegawai']; ?></td>
                                <td><?= $row['no_tlp']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td>
                                <!-- a href -->
                                <a href="penjaga-edit.php?id_pegawai=<?php echo $row["id_pegawai"]; ?>" class="btn btn-success btn-circle btn-sm">
                                <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <!-- a href -->
                                <a href="penjaga-hapus.php?id_pegawai=<?php echo $row["id_pegawai"]; ?>"  class="btn btn-danger btn-circle btn-sm" onclick="return ('yakin mau delete data?')" id="alert" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-trash"></i>
                                </a>       
                                </td>
                            </tr>
                              <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                    <?php
                    $res->free();
                    }else
                    echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$conn->error:"")."<br>";
                    }
                    else
                    echo "Gagal koneksi".(DEVELOPMENT?" : ".$conn->connect_error:"")."<br>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>
