<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/plugins/images/favicon.png">
    <title><?= $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../assets/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/Buttons-1.6.1/css/buttons.dataTables.min.css" />
    <script src="../assets/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="../assets/DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>
    <script src="../assets/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css" />

    <script src="../assets/js/js-hapus.js"></script>
    <script src="../assets/js/js-logout.js"></script>
</head>

<body class="fix-header">
    <?php if ($title == 'Pengguna-Laundry') { ?>
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    <?php } ?>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <b style="color:black">
                            kirei
                        </b>
                        <span class="hidden-xs text-dark">
                            laundry
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="../assets/images/avatar.svg" alt="user-img" width="36" class="img-circle">
                            <b class="hidden-xs"><?= $_SESSION['nm_pengguna']; ?></b></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="../dashboard/index.php" class="waves-effect 
                            <?php if ($title == 'Dashboard') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>Dashboard
                        </a>
                        <a href="../konsumen/konsumen-laundry.php" class="waves-effect 
                            <?php if ($title == 'Konsumen') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-users fa-fw" aria-hidden="true"></i>Konsumen
                        </a>
                        <a href="../layanan/layanan.php" class="waves-effect 
                            <?php if ($title == 'Layanan') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-file-text fa-fw" aria-hidden="true"></i>Layanan
                        </a>
                        <a href="../barang/barang.php" class="waves-effect 
                            <?php if ($title == 'Barang') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-tasks fa-fw" aria-hidden="true"></i>Barang
                        </a>
                        <a href="../transaksi/transaksi.php" class="waves-effect 
                            <?php if ($title == 'Transaksi') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>Transaksi
                        </a>
                        <a href="../laporan/laporan.php" class="waves-effect 
                            <?php if ($title == 'Laporan') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-files-o fa-fw" aria-hidden="true"></i>Laporan
                        </a>
                        <a href="../pengguna/pengguna.php" class="waves-effect 
                            <?php if ($title == 'Pengguna-Laundry') {
                                echo 'active';
                            } ?>">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>Pengguna
                        </a>
                    </li>
                </ul>
                <div class="center p-20">
                    <a href="../logout.php" class="btn btn-danger btn-block waves-effect waves-light log-out">Log Out</a>
                </div>
            </div>

        </div>

        <div id="page-wrapper">