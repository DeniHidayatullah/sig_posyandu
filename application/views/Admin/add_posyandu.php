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
                        <h4 class="page-title">Tambah Posyandu</h4>
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
                                    <form action="<?php echo base_url('Admin/addPosyanduAction'); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Nama
                                                Posyandu</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="nama_posyandu"
                                                    class="form-control" id="nama_posyandu" placeholder="Nama Posyandu"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Penanggung
                                                Jawab</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="penanggung_jawab"
                                                    class="form-control" id="penanggung_jawab"
                                                    placeholder="Penanggung Jawab" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-4  control-label col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" style="border-radius: 10px;" name="alamat_posyandu"
                                                    class="form-control" id="alamat_posyandu"
                                                    placeholder="Alamat Posyandu" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">
                                                Lokasi</label>
                                            <div class="col-sm-4">
                                                <input class="form-control " placeholder="Longitude.." type="text"
                                                    name="longitude" id="longitude">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control " placeholder="Latitude" type="text"
                                                    name="latitude" id="latitude">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div id="map" style="width: 100%; height: 500px;"></div>
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
                <!-- Sales chart -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer text-center">
                COPYRIGHT © 2022
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->

    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet-extra-markers@1.2.1/dist/js/leaflet.extra-markers.js"></script>

    <script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [-8.0120475, 113.8296833];
    }
    var map = L.map('map').setView([-8.0120475, 113.8296833], 13);

    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $('#latitude').val(position.lat);
        $('#longitude').val(position.lng).keyup();
    })

    $('#latitude, #longitude').change(function() {
        var position = [parseInt($('#latitude').val()), parseInt($('#longitude').val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });

    map.addLayer(marker);
    </script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->

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