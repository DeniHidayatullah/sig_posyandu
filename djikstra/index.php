<?php 
include ('connection.php');
require("RunTest.php");
// if ($this->session->userdata('username') == null) {
//     redirect('auth');
// }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-posyandu.png">
    <title>SIG - POSYANDU</title>
    <!-- Custom CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->

    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-kemenkes.png" width="210px" height="80px" alt="homepage"
                                class="light-logo" />

                        </b>

                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">

                    </ul>
                    <h5 class="card-header" style="color:#fff;"></h5>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href=""><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-light sidebar-link"
                                href="User" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="User/imunisasi" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span
                                    class="hide-menu">Imunisasi</span></a></li>
                        <br>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Balita</h4>
                        <div class="ml-auto text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="ruteTerpendek.php" method="get">
                                    <div class="mb-3">
                                        <label for="dari">Dari</label>
                                        <select name="dari" class="form-control" id="dari">
                                            <?php
                                                $no = 1;
                                                $data =  mysqli_query($conn, "select * from kecamatan");
                                                while($d = mysqli_fetch_assoc($data))
                                                {
                                                echo '<option value="'.$d['nama_kecamatan'].'">'.$d['nama_kecamatan'].'</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ke">Ke</label>
                                        <select name="ke" class="form-control" id="ke">
                                            <?php
                                                $no = 1;
                                                $data =  mysqli_query($conn, "select * from kecamatan");
                                                while($d = mysqli_fetch_assoc($data))
                                                {
                                                echo '<option value="'.$d['nama_kecamatan'].'">'.$d['nama_kecamatan'].'</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div>
                        </div>
                        <?php
                            if (isset($_GET['dari'],$_GET['ke'])) {
                            $dari = $_GET['dari'];
                            $ke = $_GET['ke'];

                            $path = runTest($dari,$ke);
                            ?>
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <p>Rute terpendek dari <?php echo $dari; ?> ke <?php echo $ke; ?> adalah :</p>
                                <?php
                                    if ($dari == $ke) {
                                    echo $dari;
                                    }else {
                                    //var_dump($path);
                                    echo implode(' -> ', $path);
                                    }
                                    ?>
                            </div>
                        </div>
                        <?php
                                    }
                                    ?>
                    </div>

                </div>
                <!-- End Row  -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer text-center">
                COPYRIGHT © BIKEA TECHNOCRAFT 2019
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="assets/dist/js/pages/chart/chart-page-init.js"></script>
</body>

</html>