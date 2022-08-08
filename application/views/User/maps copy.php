<?php $this->load->view('templates/header');
// if ($this->session->userdata('username') == null) {
//     redirect('auth');
// }
?>
<style>
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
    top: 10px;

    height: 575px;
    width: 1200px;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

#floating-panel {
    position: absolute;
    top: 10px;
    left: 25%;
    z-index: 5;
    background-color: #ffff;
    padding: 5px;
    border: 1px solid #9999;
    text-align: center;
    font-family: 'Roboto', 'sans-serif';
    line-height: 30px;
    padding-left: 10px;
}

#floating-panel {
    position: absolute;
    top: 5px;
    left: 50%;
    margin-left: -180px;
    width: 350px;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
}

/* #latlng {} */
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <?php $this->load->view('templates/navbar'); ?>
        <!-- End Topbar header -->

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
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($kecamatan as $c) : ?>
                                            <option value="<?= $c['nama_kecamatan'] ?>"><?= $c['nama_kecamatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ke">Ke</label>
                                        <select name="ke" class="form-control" id="ke">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($kecamatan as $c) : ?>
                                            <option value="<?= $c['nama_kecamatan'] ?>"><?= $c['nama_kecamatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer text-center" style="margin-top: 30px;">
                COPYRIGHT © BIKEA TECHNOCRAFT 2021
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url() ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url() ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/pages/chart/chart-page-init.js"></script>
    <script>
    </script>
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function() {

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>

</html>