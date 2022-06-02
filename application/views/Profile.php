<?php $this->load->view('templates/header');
if ($this->session->userdata('username') == null) {
    redirect('auth');
}
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
        <?php $this->load->view('templates/navbar', $jabatan); ?>
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
                        <h4 class="page-title">Profil Sekolah</h4>
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
                <!-- <div class="row">
                   
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                                <h6 class="text-white">Jumlah Peserta Didik</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-school"></i></h1>
                                <h6 class="text-white">Jumlah Tenaga Didik</h6>
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">Jumlah Rombel</h6>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-4">
                                    <div class="card">

                                        <div class="card-body text-info">
                                            <h5 class="card-title"><i class="fas fa-arrow-alt-circle-right"></i>    SDN Badean 01 Bondowoso</h5>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>     Jl. Letjend S Parman No 10 Badean Bondowoso</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	0332 - 420292</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Akreditasi B</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	NSS 101052201010</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="card">

                                        <div class="card-body text-info">
                                            <h5 class="card-title"><i class="fas fa-arrow-alt-circle-right"></i>    Visi</h5>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mewujudkan generasi beriman dan bertaqwa.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mewujudkan generasi yang cerdas serta berprestasi baik dibidang akademik maupun non akademik..</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mewujudkan generasi yang terampil.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mewujudkan generasi yang berbudi pekerti luhur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="card">

                                        <div class="card-body text-info">
                                            <h5 class="card-title"><i class="fas fa-arrow-alt-circle-right"></i>    Misi Sekolah</h5>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Menanamkan keimanan dan ketaqwaan melalui pengamalan ajaran agama.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Melaksanakan program akademik seiring dengan perkembangan teknologi.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mengasah bakat dan minat melalui kegiatan ekstrakurikuler.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Membangun mentalitas moral / etika karakter peserta didik, melatih diri untuk berbuat berdasarkan budi pekerti.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mengembangkan daya kreatifitas dan kompetensi dasar melalui kegiatan pembelajaran yang bersifat akademik muun non akademik.</p>
                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-4">
                                    <div class="card">

                                        <div class="card-body text-info">
                                            <h5 class="card-title"><i class="fas fa-arrow-alt-circle-right"></i>    Strategi sekolah</h5>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Menjalankan nilai – nilai ajaran agama dan berperilaku akhlakul karimah dalam kehidupan sehari – hari.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Melaksanakan program akademik melalui pembelajaran yang inovatif.</p>
                                            <p class="card-text"><i class="fas fa-angle-right"></i>  	Mengadakan program kelas unggulan serta menyediakan sarana prasarana pembelajaran yang memadai serta ikut serta dalam berbagai kompetisi.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            COPYRIGHT © BIKEA TECHNOCRAFT 2019 
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
    <script src="<?= base_url() ?>vendor/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>vendor/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>vendor/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>vendor/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>vendor/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url() ?>vendor/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url() ?>vendor/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url() ?>vendor/dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>