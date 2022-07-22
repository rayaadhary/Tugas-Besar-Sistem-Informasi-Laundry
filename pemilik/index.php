<?php
$title = 'Dashboard';
require '../functions.php';
require '../layout/layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pegawai</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i>
                        <span class="counter text-success">
                            <?php
                            $query = "SELECT COUNT(id_pegawai) FROM pegawai";
                            $result = ambilsatubaris($conn, $query);
                            ?>
                            <?= $result['COUNT(id_pegawai)']; ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Konsumen</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i>
                        <span class="counter text-purple">
                            <?php
                            $query = "SELECT COUNT(id_konsumen) FROM konsumen";
                            $result = ambilsatubaris($conn, $query);
                            ?>
                            <?= $result['COUNT(id_konsumen)']; ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Penghasilan bulan ini</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i>
                        <span class="counter text-info">
                            <?php
                            $query = "SELECT SUM(total) FROM transaksi WHERE MONTH(tgl)=MONTH(NOW())";
                            $result = ambilsatubaris($conn, $query);
                            ?>
                            <?= $result['SUM(total)']; ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
require '../layout/layout_footer.php';
?>