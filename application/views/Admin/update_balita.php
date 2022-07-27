<?php $this->load->view('templates/header');
// if ($this->session->userdata('username') == null) {
//     redirect('auth');
// }
?>

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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('templates/navbar'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Balita</h4>
                        <div class="ml-auto text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-gruop">
                                    <form action="<?php echo base_url('Admin/updateBalitaAction'); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $balita->id?>">
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Nama
                                                Balita</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="nama_balita"
                                                    class="form-control" id="nama_balita" placeholder="Nama Balita"
                                                    value="<?= $balita->nama_balita?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-8">
                                                <label>
                                                    <input type="radio" name="jk_balita" id="jk_balita" value="L"
                                                        <?php if($balita->jk_balita=='L') echo 'checked'?>>
                                                    Laki-Laki
                                                </label>
                                                <label>
                                                    <input type="radio" name="jk_balita" id="jk_balita" value="P"
                                                        <?php if($balita->jk_balita=='P') echo 'checked'?>>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Tempat
                                                Tanggal Lahir</label>
                                            <div class="col-sm-4">
                                                <input type="text" style="border-radius: 10px;"
                                                    name="tempat_lahir_balita" class="form-control"
                                                    id="tempat_lahir_balita" placeholder="Tempat lahir"
                                                    value="<?= $balita->tempat_lahir_balita?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date" style="border-radius: 10px;"
                                                    name="tanggal_lahir_balita" class="form-control"
                                                    id="tanggal_lahir_balita" placeholder="Tanggal lahir"
                                                    value="<?= $balita->tanggal_lahir_balita?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-4  control-label col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="alamat_balita"
                                                    class="form-control" id="alamat_balita" placeholder="Alamat"
                                                    value="<?= $balita->alamat_balita?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-success"
                                                    style="width: 80px;">Simpan</button>
                                            </div>
                                        </div>


                                    </form>
                                </div><br>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                COPYRIGHT © 2022
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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


</body>

</html>